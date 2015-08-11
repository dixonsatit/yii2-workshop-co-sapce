<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['evauate-score/index']) ?>">ทำแบบประเมิน</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>Yii 2 Workshop @ Co-Space </h2>

                <p>
                เป็นการสอนแบบเต็มรูปแบบครั้งแรกครับ โดยเน้นการใช้งานเครื่องมือที่ Yii 2 มีมาให้โดยไม่ใช้ extension จึงนำสิ่งที่ได้เรียนรู้มาฝากกัน โดยมีหัวข้อดังต่อไปนี้
                <ul>
                  <li>การจัดการ User Management</li>
                  <li>การสร้าง User Profile</li>
                  <li>การสร้างและการใช้งาน RBAC Db </li>
                  <li>การสร้างระบบจัดการสิทธิ์ (Role Assignmen)t</li>
                  <li>การสร้างฟอร์มบันทึกข้อมูลทีละหลายๆ แถว : Tabular input</li>
                  <li>การสร้าง layout ไว้ใช้งานหลายๆแบบ</li>
                </ul>
                </p>

                <p><a class="btn btn-default" href="#">อ่านบทความได้ที่นี่ &raquo;</a></p>
            </div>

        </div>

    </div>
</div>
