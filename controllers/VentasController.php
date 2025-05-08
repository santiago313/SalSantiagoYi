<?php

namespace app\controllers;
use yii;
use app\models\Ventas;
use app\models\VentasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentasController implements the CRUD actions for Ventas model.
 */
class VentasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ventas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VentasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ventas model.
     * @param int $idventas Idventas
     * @param int $clientes_idclientes Clientes Idclientes
     * @param int $vehiculos_idvehiculos Vehiculos Idvehiculos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idventas, $clientes_idclientes, $vehiculos_idvehiculos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idventas, $clientes_idclientes, $vehiculos_idvehiculos),
        ]);
    }

    /**
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ventas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ventas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idventas Idventas
     * @param int $clientes_idclientes Clientes Idclientes
     * @param int $vehiculos_idvehiculos Vehiculos Idvehiculos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idventas, $clientes_idclientes, $vehiculos_idvehiculos)
    {
        $model = $this->findModel($idventas, $clientes_idclientes, $vehiculos_idvehiculos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ventas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idventas Idventas
     * @param int $clientes_idclientes Clientes Idclientes
     * @param int $vehiculos_idvehiculos Vehiculos Idvehiculos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idventas, $clientes_idclientes, $vehiculos_idvehiculos)
    {
        $this->findModel($idventas, $clientes_idclientes, $vehiculos_idvehiculos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idventas Idventas
     * @param int $clientes_idclientes Clientes Idclientes
     * @param int $vehiculos_idvehiculos Vehiculos Idvehiculos
     * @return Ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idventas, $clientes_idclientes, $vehiculos_idvehiculos)
    {
        if (($model = Ventas::findOne(['idventas' => $idventas, 'clientes_idclientes' => $clientes_idclientes, 'vehiculos_idvehiculos' => $vehiculos_idvehiculos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
