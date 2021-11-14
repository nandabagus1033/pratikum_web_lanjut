<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{	
	protected $table                = 'posts';
	protected $primaryKey           = 'post_id';
	protected $allowedFields        = ['judul','deskripsi','gambar','author','kategori','slug','created_at','updated_at'];
	protected $useTimestamps        = true;
	

	function hapusdata($slug){
		return $this->db->table('posts')->delete(['slug' => $slug]);
	}

	public function getPostModel($slug = false){
		if($slug = false){
			return $this->findAll();
		}

		return $this->Where(['slug' => $slug])->first();
	}

	function ambildata($slug)
	{
		return $this->db->table('posts')->getWhere(['slug' => $slug]);
	}

	function editdata($data, $slug){

		return $this->db->table('posts')->update($data, ['slug' => $slug]);
	}
}