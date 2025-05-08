<?php

namespace app\controllers;
use Yii;
use app\models\Detalleventa;
use app\models\DetalleventaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleventaController implements the CRUD actions for Detalleventa model.
 */
class DetalleventaController extends Controller
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
     * Lists all Detalleventa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetalleventaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalleventa model.
     * @param int $iddetalleventa Iddetalleventa
     * @param int $ventas_idventas Ventas Idventas
     * @param int $vendedores_idvendedores Vendedores Idvendedores
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddetalleventa, $ventas_idventas, $vendedores_idvendedores)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddetalleventa, $ventas_idventas, $vendedores_idvendedores),
        ]);
    }

    /**
     * Creates a new Detalleventa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detalleventa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddetalleventa' => $model->iddetalleventa, 'ventas_idventas' => $model->ventas_idventas, 'vendedores_idvendedores' => $model->vendedores_idvendedores]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detalleventa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddetalleventa Iddetalleventa
     * @param int $ventas_idventas Ventas Idventas
     * @param int $vendedores_idvendedores Vendedores Idvendedores
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddetalleventa, $ventas_idventas, $vendedores_idvendedores)
    {
        $model = $this->findModel($iddetalleventa, $ventas_idventas, $vendedores_idvendedores);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddetalleventa' => $model->iddetalleventa, 'ventas_idventas' => $model->ventas_idventas, 'vendedores_idvendedores' => $model->vendedores_idvendedores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detalleventa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddetalleventa Iddetalleventa
     * @param int $ventas_idventas Ventas Idventas
     * @param int $vendedores_idvendedores Vendedores Idvendedores
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddetalleventa, $ventas_idventas, $vendedores_idvendedores)
    {
        $this->findModel($iddetalleventa, $ventas_idventas, $vendedores_idvendedores)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detalleventa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddetalleventa Iddetalleventa
     * @param int $ventas_idventas Ventas Idventas
     * @param int $vendedores_idvendedores Vendedores Idvendedores
     * @return Detalleventa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddetalleventa, $ventas_idventas, $vendedores_idvendedores)
    {
        if (($model = Detalleventa::findOne(['iddetalleventa' => $iddetalleventa, 'ventas_idventas' => $ventas_idventas, 'vendedores_idvendedores' => $vendedores_idvendedores])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
