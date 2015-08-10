<?php

namespace frontend\controllers;
use kartik\mpdf\Pdf;

class ReportController extends \yii\web\Controller
{
  public function actionIndex() {

        $content = $this->renderPartial('index');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'marginTop' => 10,
            'marginLeft' => 15,
            'marginRight' => 15,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => '
              body{
                font-family:"garuda", "sans-serif";
                font-size:14px;
              }
                    p{
                    font-size:10px;
                    line-height: 4px;
                    }
                    #wrapper{

                    width: 210.5mm;
                    height: 150mm;
                    margin: 0px;
                }
                #header{
                height: 25mm;
                }
                #header p{
                    margin-bottom: 0px;
                }
                .row1{
                height: 50%
                margin: 0px;
                }
                .row2{
                height: 50%
                margin: 0px;
                background-color: yellow;
                }


            ',
            // set mPDF properties on the fly
            'options' => [
                'title' => '',
            ],
            // call mPDF methods on the fly
            'methods' => [
            //'SetHeader' => ['รายละเอียดการประเมินปัญหาแรกรับ'],
            //'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
