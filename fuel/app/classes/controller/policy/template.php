<?php
class Controller_Policy_Template extends Controller_Template
{

	public function action_index()
	{
		$data['templates'] = Model_Policy_Template::find('all');
		$this->template->title = "Templates";
		$this->template->content = View::forge('policy/template/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('policy/template');

		if ( ! $data['template'] = Model_Policy_Template::find($id))
		{
			Session::set_flash('error', 'Could not find template #'.$id);
			Response::redirect('policy/template');
		}

		$this->template->title = "Template";
		$this->template->content = View::forge('policy/template/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Policy_Template::validate('create');

			if ($val->run())
			{
				$template = Model_Policy_Template::forge(array(
				));

				if ($template and $template->save())
				{
					Session::set_flash('success', 'Added template #'.$template->id.'.');

					Response::redirect('policy/template');
				}

				else
				{
					Session::set_flash('error', 'Could not save template.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Templates";
		$this->template->content = View::forge('policy/template/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('policy/template');

		if ( ! $template = Model_Policy_Template::find($id))
		{
			Session::set_flash('error', 'Could not find template #'.$id);
			Response::redirect('policy/template');
		}

		$val = Model_Policy_Template::validate('edit');

		if ($val->run())
		{

			if ($template->save())
			{
				Session::set_flash('success', 'Updated template #' . $id);

				Response::redirect('policy/template');
			}

			else
			{
				Session::set_flash('error', 'Could not update template #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('template', $template, false);
		}

		$this->template->title = "Templates";
		$this->template->content = View::forge('policy/template/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('policy/template');

		if ($template = Model_Policy_Template::find($id))
		{
			$template->delete();

			Session::set_flash('success', 'Deleted template #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete template #'.$id);
		}

		Response::redirect('policy/template');

	}

}
