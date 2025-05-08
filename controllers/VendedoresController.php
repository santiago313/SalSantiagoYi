<?php

namespace app\controllers;

use app\models\Vendedores;
use app\models\VendedoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * VendedoresController implements the CRUD actions for Vendedores model.
 */
class VendedoresController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete', 'reset-password', 'change-password'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['change-password'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'reset-password', 'change-password'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role == 'admin';
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vendedores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VendedoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendedores model.
     * @param int $idvendedores Idvendedores
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idvendedores)
    {
        return $this->render('view', [
            'model' => $this->findModel($idvendedores),
        ]);
    }

    /**
     * Creates a new Vendedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vendedores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idvendedores' => $model->idvendedores]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vendedores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idvendedores Idvendedores
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idvendedores)
    {
        $model = $this->findModel($idvendedores);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idvendedores' => $model->idvendedores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vendedores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idvendedores Idvendedores
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idvendedores)
    {
        $this->findModel($idvendedores)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vendedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idvendedores Idvendedores
     * @return Vendedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idvendedores)
    {
        if (($model = Vendedores::findOne(['idvendedores' => $idvendedores])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
