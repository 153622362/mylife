<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m181229_081810_create_news_table extends Migration
{
	public function up()
	{
		$this->createTable('news', [
			'id' => $this->primaryKey(),
			'title' => $this->string()->notNull()->comment('新闻标题'),
			'content' => $this->text()->notNull(),
			'created_at' => $this->dateTime()->notNull(),
		]);

		$this->addColumn('news', 'position', $this->integer()->notNull());
		$this->addCommentOnColumn('news', 'content', '新闻内容');

	}

	public function down()
	{
		$this->dropTable('news');
	}

//    /**
//	 * 事务迁移
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//        $this->createTable('news', [
//            'id' => $this->primaryKey(),
//        ]);
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        $this->dropTable('news');
//    }
}
