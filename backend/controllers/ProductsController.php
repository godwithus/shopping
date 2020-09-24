<?php

namespace backend\controllers;

use Yii;
use backend\models\Products;
use backend\models\Picture;
use backend\models\ProductsSearch;
use backend\models\ProductContainer;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['create', 'update'], If this is enable only the action in that array will not be accessible
                'rules' => [
                    [
                        'actions' => ['index'], // Only the action in this array will be accessible
                        'allow' => true
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                    
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->Auth();
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->Auth();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->Auth();
        $model = new Products();

        $conditions = ProductContainer::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $imageFile = UploadedFile::getInstance($model, 'image');

            if(isset($imageFile->size)){

                if(!file_exists(Url::to('@webfront/images/products/'))){
                    mkdir(Url::to('@webfront/images/products/'), 0777, true);
                }

                $imageName = Url::to('@webfront/images/products/').'/'.$imageFile->baseName.'.'.$imageFile->extension;

                $imageFile->saveAs($imageName);
            }

            $model->user_email = Yii::$app->user->identity->email;
            $model->ikey = time().rand(1, 100);
            $model->image = $imageFile->baseName.'.'.$imageFile->extension;
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'conditions' => ArrayHelper::map($conditions, 'id', 'name'),
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->Auth();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionMultiple(){
        $upload = new Picture();
        $products = Products::find()->where(['status' => 1])->all();

        if($upload->load(Yii::$app->request->post())){
            $upload->image = UploadedFile::getInstances($upload, 'image');
            if($upload->image && $upload->validate()){
                if(!file_exists(Url::to('@webfront/images/products/'))){
                    mkdir(Url::to('@webfront/images/products/'), 0777, true);
                }
            }
            $path = Url::to('@webfront/images/products/');
            
            foreach($upload->image as $image){
                $model = new Picture();
                $model->product_id = $upload->product_id;
                $model->image = time().rand(100, 999).'.'.$image->extension;
                
                if($model->save(false)){
                    $image->saveAs($path.$model->image);
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('multiple', 
        [
            'upload'=>$upload, 
            'products'=> ArrayHelper::map($products, 'id', 'name'),
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->Auth();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function Auth()
    {
        // We are manually coding out the checking to see if the user is login in not
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
    }
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
