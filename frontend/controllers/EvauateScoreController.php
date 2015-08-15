<?php

namespace frontend\controllers;

use Yii;
use yii\base\Model;
use common\models\Group;
use common\models\KpiItem;
use common\models\Hospital;
use common\models\HospitalAssignment;
use common\models\EvauateScore;
use frontend\models\HospitalSearch;
use frontend\models\EvauateScoreSearch;
use frontend\models\HospitalAssignmentSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * EvauateScoreController implements the CRUD actions for EvauateScore model.
 */
class EvauateScoreController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['User','Provinceial','Country']
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all EvauateScore models.
     * @return mixed
     */
     public function actionIndex()
     {
         $searchModel = new HospitalAssignmentSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
     }

    /**
     * Displays a single EvauateScore model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EvauateScore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($hospital_id,$group_id=null)
    {
        $group_id = $this->loadDefaultGroup($group_id);
        $models   = $this->loadEvauateScoreModels($hospital_id,'2558',$group_id);

        $sumTheMust  = $this->loadSummaryByUser($hospital_id,'2558',$group_id,1);
        $sumTheBest  = $this->loadSummaryByUser($hospital_id,'2558',$group_id,2);

         $sumTheMustLevel1  = $this->loadSummaryLevel($hospital_id,'2558',$group_id,1,1);
         $sumTheBestLevel1  = $this->loadSummaryLevel($hospital_id,'2558',$group_id,2,1);


        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                $model->save(false);
            }
            return $this->redirect(['evauate-score/create','hospital_id'=>$hospital_id,'group_id'=>$group_id]);
        }

        return $this->render('create', [
            'models'   => $models,
            'hospital_id' => $hospital_id,
            'group_id' => $group_id,
            'sumTheMust' => $sumTheMust,
            'sumTheBest' => $sumTheBest
        ]);
    }

    /**
     * [ check is empty EvauateScore]
     * @param  integer $hospital_id
     * @param  string $year
     * @return array  EvauateScore
     */
    public function loadEvauateScoreModels($hospital_id,$year,$group_id){
      $models = $this->findEvauateScoreModels($hospital_id,$year,$group_id);
      if(count($models)>0){
        return $models;
      }else{
        return $this->createEvauateScoreModels($hospital_id,$year,$group_id);
      }
    }

    /**
     * [findEvauateScoreModels description]
     * @param  [type] $hospital_id [description]
     * @param  [type] $year        [description]
     * @return [type]              [description]
     */
    public function findEvauateScoreModels($hospital_id,$year,$group_id){
      $evauateScores = EvauateScore::find()
        ->byUser()
        ->byHospital($hospital_id)
        ->byYear($year)
        ->byGroup($group_id)
        ->all();
      return $evauateScores;
    }

    public function loadSummaryByUser($hospital_id,$year,$group_id,$value=1){
      $evauateScores = EvauateScore::find()
        ->byUser()
        ->byHospital($hospital_id)
        ->byYear($year)
        ->byGroup($group_id)
        ->sumByValue($value)
        ->asArray()
        ->sum('value');
      return $evauateScores;
    }
    public function loadSummaryLevel($hospital_id,$year,$group_id,$value=1,$level=1){
      $evauateScores = EvauateScore::find()
        ->byLevel($level)
        ->byHospital($hospital_id)
        ->byYear($year)
        ->byGroup($group_id)
        ->sumByValue($value)
        ->asArray()
        ->sum('value');
      return $evauateScores;
    }

    /**
     * [createEvauateScoreModels description]
     * @param  [type] $hospital_id [description]
     * @param  [type] $year        [description]
     * @return [type]              [description]
     */
    public function createEvauateScoreModels($hospital_id,$year,$group_id=null){

      $items  = KpiItem::find()
      ->byGroup($group_id)
      ->orderBy('group_id')
      ->all();


      $evauateScores = [];
      foreach($items as $item){
        $evauateScores[] = new EvauateScore([
          'kpi_id'=> $item->id,
          'theMust'=> $item->the_must,
          'theBest'=> $item->the_best,
          'year' => $year,
          'level' => Yii::$app->user->identity->level,
          'hospital_id'=> $hospital_id,
          'groupName'=>$item->group->name
        ]);
      }
      return $evauateScores;
    }

    public function loadDefaultGroup($group_id)
    {
      if($group_id==null){
        $groupHead = Group::find()->byHead()->all();
        $group_id = $groupHead[0]->id;
      }
      return $group_id;
    }



    /**
     * Deletes an existing EvauateScore model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EvauateScore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EvauateScore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EvauateScore::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findHospitalModel($id)
    {
        if (($model = HospitalAssignment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionSummary(){
        return $this->render('');
    }


}
