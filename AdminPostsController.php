<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Controllers\BaseController;

class AdminPostsController extends BaseController
{

	protected $PostModel;
	public function __construct()
	{
		$this->PostModel = new PostModel();
	}


	public function index()
	{
		$PostModel = model("PostModel");
		$data = [
			'posts' => $PostModel->findAll()
		];
		return view("posts/index" , $data);
	}
	public function create()
	{
		session();
		$data =[
			'validation' => \config\Services::validation(),
		];
		return view("posts/create", $data);
	}

	public function validedit()
	{
		session();
		$data =[
			'validation' => \config\Services::validation(),
		];
		return view("posts/viewformedit", $data);
	}

	public function store()
	{
		$valid = $this->validate([
			"judul" =>[
				"label" => "judul",
				"rules" => "required",
				"errors" =>[
					"required" => "{field} Harus Diisi!"
				]
				],
				"slug" =>[
					"label" => "Slug",
					"rules" => "required|is_unique[posts.slug]",
					"errors" =>[
					"required" => "{field} Harus Diisi!",
					"is_unique" => "{field} Sudah ada!",
					]
				],

				"kategori" =>[
					"label" => "kategori",
					"rules" => "required",
					"errors" =>[
						"required" => "{field} Harus Diisi!"
					]
				],

				"author" =>[
					"label" => "author",
					"rules" => "required",
					"errors" =>[
						"required" => "{field} Harus Diisi!"
					]
				],

				"deskripsi" =>[
					"label" => "deskripsi",
					"rules" => "required",
					"errors" =>[
						"required" => "{field} Harus Diisi!"
					]
				],
		
		]);

		if($valid){

			$data =[
				'judul' => $this->request->getVar('judul'),
				'slug' => $this->request->getVar('slug'),
				'kategori' => $this->request->getVar('kategori'),
				'author' => $this->request->getVar('author'),
				'deskripsi' => $this->request->getVar('deskripsi'),
			];
			$PostModel = model("PostModel");
			$PostModel ->insert($data);
			return redirect()->to(base_url('admin/posts'));
		}else{
			return redirect()->to(base_url('admin/posts/create'))->withInput()->with('validation',$this->validator);
		}
	}

	public function delete(){
		$uri = service('uri');
		$slug = $uri->getSegment('3');
	
		$PostModel = model("PostModel");

		$PostModel->hapusdata($slug);

		return redirect()->to(base_url('admin/posts'));
	}


	public function edit()
	{
	
		$uri = service('uri');
		$slug = $uri->getSegment('3');
		$PostModel = model("PostModel");

		$ambildata = $PostModel->ambildata($slug);

		if(count($ambildata->getResult()) > 0){
			$row = $ambildata->getRow();
			$data =[
				'judul' => $row->judul,
				'slug' => $row->slug,
				'kategori' => $row->kategori,
				'author' => $row->author,
				'deskripsi' => $row->deskripsi,
				'validation' => \config\Services::validation()
			];
			echo view('posts/viewformedit',$data);
		}

	}



// 	function updatedata()

// 	{

// 		$valid = $this->validate([
// 			"judul" =>[
// 				"label" => "judul",
// 				"rules" => "required",
// 				"errors" =>[
// 					"required" => "{field} Harus Diisi!"
// 				]
// 				],
// 				"slug" =>[
// 					"label" => "Slug",
// 					"rules" => "required|is_unique[posts.slug]",
// 					"errors" =>[
// 					"required" => "{field} Harus Diisi!",
// 					"is_unique" => "{field} Sudah ada!",
// 					]
// 				],

// 				"kategori" =>[
// 					"label" => "kategori",
// 					"rules" => "required",
// 					"errors" =>[
// 						"required" => "{field} Harus Diisi!"
// 					]
// 				],

// 				"author" =>[
// 					"label" => "author",
// 					"rules" => "required",
// 					"errors" =>[
// 						"required" => "{field} Harus Diisi!"
// 					]
// 				],

// 				"deskripsi" =>[
// 					"label" => "deskripsi",
// 					"rules" => "required",
// 					"errors" =>[
// 						"required" => "{field} Harus Diisi!"
// 					]
// 				],
		
// 		]);

// 		if($valid){

// 		$slug = $this->request->getVar('slug');
// 		$data =[
// 			'judul' => $this->request->getVar('judul'),
// 			'slug' => $this->request->getVar('judul'),
// 			'kategori' => $this->request->getVar('kategori'),
// 			'author' => $this->request->getVar('author'),
// 			'deskripsi' => $this->request->getVar('deskripsi'),
			
// 		];
// 		$PostModel = model("PostModel");
// 		$simpan = $PostModel ->editdata($data , $slug);

// 			if($simpan){
// 				return redirect()->to(base_url('admin/posts'));
// 			}
// 		}else{
// 			return redirect()->to(base_url('admin/posts/edit/' .$this->request->getVar('slug')))->withInput()->with('validation', $this->validator);
// 		}
// 	}
// }

	function updatedata()

	{
		$slug = $this->request->getVar('slug');
		$data =[
			'judul' => $this->request->getVar('judul'),
			'slug' => $this->request->getVar('judul'),
			'kategori' => $this->request->getVar('kategori'),
			'author' => $this->request->getVar('author'),
			'deskripsi' => $this->request->getVar('deskripsi'),
		];
		$PostModel = model("PostModel");
		$simpan = $PostModel ->editdata($data , $slug);

		if($simpan){
			return redirect()->to(base_url('admin/posts'));
		}else{
			echo view('posts/viewformedit',$data);
		}
	}
}