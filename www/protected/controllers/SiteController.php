<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return [];
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$page = (int) (Yii::app()->request->getQuery('page') ? Yii::app()->request->getQuery('page') : 1);
		$d = Diaries::model()->findAllBySQL('SELECT * FROM diaries AS a INNER JOIN 
            (SELECT diary_id as di, MAX(id) as kek FROM posts group by diary_id) gg ON a.id = gg.di
            ORDER BY gg.kek DESC LIMIT 5 OFFSET :page', ["page" => ($page - 1) * 5]);
		$count = Diaries::model()->find()->count();

		$pages = ($count % 5 === 0) ? $count / 5 : $count / 5 + 1;

		$this->render('index', compact("d", "pages", "page"));
	}

	public function actionDiary()
	{
		$p = Posts::model()->findAllByAttributes(["diary_id" => Yii::app()->request->getQuery('id')]);
		$this->render('diary', compact("p"));
	}


	public function actionAddPost()
	{
		if (!Yii::app()->request->isPostRequest) {
			return;
		}
		$diary_id = Yii::app()->request->getPost("diary_id");
		$message = Yii::app()->request->getPost("message");
		$post = new Posts();
		$post->message = htmlspecialchars($message);
		$post->diary_id = $diary_id;
		$post->save();
		return $this->redirect("index.php?r=site/diary&id=" . $diary_id);
	}



	public function actionCreateDiary()
	{
		if (!Yii::app()->request->isPostRequest) {
			return $this->render("addDiary");
		}
		$diary = new Diaries();
		$diary->name = htmlspecialchars(Yii::app()->request->getPost('name'));
		$diary->description = htmlspecialchars(Yii::app()->request->getPost('description'));
		$diary->save();

		$post = new Posts();
		$post->message = "init diary";
		$post->diary_id = $diary->id;
		$post->save();
		return $this->redirect("index.php");
	}


	public function actionSeed()
	{
		$p = new Posts();
		$p->message = md5(rand(1, 99999));

		$d = new Diaries();
		$d->name = md5(rand(1, 99999));
		$d->description = md5(rand(1, 99999));
		$d->save();

		$p->diary_id = $d->id;
		$p->save();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}