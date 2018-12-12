<?php

namespace app\controllers;

use Yii;
use app\models\Presents;
use app\models\PresentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresentsController implements the CRUD actions for Presents model.
 */
class PresentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Presents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Presents model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Presents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Presents();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionJewelery()
    {
        $model = new Presents();

        $sqlData = $model->getPresents();

        return json_encode($sqlData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    public function createPresents()
    {
        $type = $_POST['type'];
        $size = $_POST ['size'];
        $price = $_POST['price'];
        $fragility = $_POST['fragility'];

        $model = new Presents();

        $model->createPresents($type, $size, $price, $fragility );

    }
    public function  actionPr($type, $size, $price, $fragility)
    {
        $model = new Presents();
        $model->createPr( $type, $size, $price, $fragility);
    }

    /**
     * Updates an existing Presents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpdated($id, $type, $size, $price, $fragility)
    {
        $model = new Presents();
        $model->updatePresents($id, $type, $size, $price, $fragility);
    }

    /**
     * Deletes an existing Presents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @throws \yii\db\Exception
     */
    public function actionDeleted($id)
    {
        $model = new Presents();
        $model->deletePresents($id);
    }

    /**
     * Finds the Presents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
