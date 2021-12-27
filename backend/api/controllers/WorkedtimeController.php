<?php

namespace backend\api\controllers;

use backend\api\models\Schedules;
use DateTime;
use yii\helpers\Json;
use yii\rest\ActiveController;
use backend\api\models\Userschedulesregistry;

class WorkedtimeController extends ActiveController
{
    public $modelClass = 'backend\api\models\Schedules';

    //devolve todos os dias trabalhados pelo funcionario
    public function actionWorkedtime($id){
        $workDays = Schedules::findAll(['userprofilesid'=>$id]);

        /*foreach ($workDays as $day){
            $day[] = Userschedulesregistry::findAll(['schedulesid'=>$day->id]);
        }*/

        /*for ($i=0;$i<sizeof($workDays);$i++){
            $workDays[i][]=Userschedulesregistry::findAll(['schedulesid'=>$workDays[i]->id]);
        }*/

        return Json::encode($workDays);
    }

    //insere registo de relogio de ponto dpo empregado
    public function actionAttendance($id){
        $horario = Schedules::findOne(['userprofilesid'=>$id]);
        if ($horario->id==null){
            $ponto = new Schedules();
            $ponto->userprofilesid=$id;
            $ponto->save();
        }else if(Userschedulesregistry::findOne(['schedulesid'=>$horario->id])==null){
            $hora = new Userschedulesregistry();
            $hora->employee_exit=null;
            $hora->schedulesid= Schedules::findOne(['userprofilesid'=>$id])->id;
            $hora->save();
        }else{
            $horaSaida = Userschedulesregistry::findOne(['schedulesid'=>$horario->id]);
            $horaSaida->employee_exit = date_create('now')->format('Y-m-d H:i:s');;
            $horaSaida->save();
        }

        return Json::encode( Userschedulesregistry::findOne(['schedulesid'=>$horario->id]));
    }
}