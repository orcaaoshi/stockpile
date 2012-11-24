<?php

class Controller_Book extends Controller
{
	public function action_top()
	{
		return Response::forge(View::forge('book/top'));
	}

	public function action_index()
	{
		$data = array();
		$books =  Model_Book::find('all', array(
				'where' => array(
					array('read_dttm', '=', '0000-00-00')
				),
				'order_by' => array(
					'set_dttm' => 'desc'
				)
			));
		$data['books_count'] = count($books);

		$config = array(
			'pagination_url' => '/stockpile/book/index',
			'total_items' => $data['books_count'],
			'per_page' => 5,
			'uri_segment' => 3,
		);
		// 指定uri_segmentの位置の値が正しく取得できない…バグかも。total_itemsとper_pageの兼ね合いか? 以下一時対応
		$config['current_page'] = Uri::segment(2);

		$pagination = Pagination::forge('mypagination', $config);

		$data['books'] = array_slice($books, $pagination->offset, $pagination->per_page);

		// 表示
		$view = View::forge('book/index', $data);
		$view->set_safe('pagination', $pagination->render());

		return Response::forge($view);
	}

	public function action_all()
	{
		$data = array();
		$books =  Model_Book::find('all', array(
				'where' => array(
					//array('read_dttm', '=', '0000-00-00')
				),
				'order_by' => array(
					'set_dttm' => 'desc'
				)
			));
		$data['books_count'] = count($books);

		$config = array(
			'pagination_url' => '/stockpile/book/all',
			'total_items' => $data['books_count'],
			'per_page' => 5,
			'uri_segment' => 3,
		);
		// 指定uri_segmentの位置の値が正しく取得できない…バグかも。total_itemsとper_pageの兼ね合いか? 以下一時対応
		$config['current_page'] = Uri::segment(2);

		$pagination = Pagination::forge('mypagination', $config);

		$data['books'] = array_slice($books, $pagination->offset, $pagination->per_page);

		// 表示
		$view = View::forge('book/all', $data);
		$view->set_safe('pagination', $pagination->render());

		return Response::forge($view);
	}

	public function action_edit($id = null)
	{
		$data = array();
		$data['id'] = $id;

		$book = ($id) ? Model_Book::find($id) : Model_Book::forge();

		if (Input::post('submit'))
		{
			$book->set_dttm = Input::post('set_dttm', '0000-00-00 00:00:00');
			$book->read_dttm = Input::post('read_dttm', '0000-00-00 00:00:00');
			$book->name = Input::post('name', '');
			$book->auther = Input::post('auther', '');
			$book->contents = Input::post('contents', '');
			$book->review = Input::post('review', '');
			$book->save();

			Response::redirect('book');
		}
		$_POST['set_dttm'] = $book->set_dttm;
		$_POST['read_dttm'] = $book->read_dttm;
		$_POST['name'] = $book->name;
		$_POST['auther'] = $book->auther;
		$_POST['contents'] = $book->contents;
		$_POST['review'] = $book->review;

		// 表示
		$view = View::forge('book/edit', $data);

		return Response::forge($view);
	}

	public function action_delete()
	{
		$id = Input::post('id');

		$book = Model_Book::find($id);
		$book->delete();

		Response::redirect('book');
	}
}
