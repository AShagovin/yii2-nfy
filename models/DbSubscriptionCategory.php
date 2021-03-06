<?php

namespace nineinchnick\nfy\models;

/**
 * This is the model class for table "{{nfy_subscription_categories}}".
 *
 * @property integer $id
 * @property integer $subscription_id
 * @property string $category
 * @property boolean $is_exception
 *
 * The followings are the available model relations:
 * @property DbSubscription $subscription
 */
class DbSubscriptionCategory extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%nfy_subscription_categories}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['subscription_id', 'category', 'is_exception'], 'required', 'except'=>'search'],
			['subscription_id', 'number', 'integerOnly'=>true],
			['is_exception', 'boolean'],
		];
	}

	public function getSubscription()
	{
		return $this->hasOne(DbSubscription::className(), ['subscription_id' => 'id']);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('models', 'ID'),
			'subscription_id' => Yii::t('models', 'Subscription ID'),
			'category' => Yii::t('models', 'Category'),
			'is_exception' => Yii::t('models', 'Is Exception'),
		];
	}
}
