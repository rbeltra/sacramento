<?php

class Admins extends CI_Model {
	public function admin_user($email) {
		$this->load->database();
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
	}
	public function add_box($post, $img) {
		$this->load->database();
		$query = "INSERT INTO `sacramento`.`boxes` (`name`, `description`, `price`, `item_amount`, `img`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, NOW(), NOW());";
		$values = [$post['name'], $post['description'], $post['amount'], $post['item_amount'], $img];
		$this->db->query($query, $values);
	}
	public function add_product($post, $img) {
		$this->load->database();
		$query = "INSERT INTO `sacramento`.`products` (`name`, `description`, `image`, `box`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = [$post['name'], $post['description'], $img, $post['preselected_box']];
		$this->db->query($query, $values);
	}
	public function boxes_name() {
		$this->load->database();
		return $this->db->query('SELECT * FROM boxes')->result_array();
	}

	public function fetch_suggestions()
	{
		$this->load->database();
		return $this->db->query("SELECT * FROM suggestion order by created_at DESC")->result_array();
	}
	public function fetch_contact()
	{
		$this->load->database();
		return $this->db->query("SELECT * FROM contact order by created_at DESC")->result_array();
	}
	public function remove_product($post) {
		$this->load->database();
		$this->db->query("DELETE FROM `sacramento`.`products` WHERE `id`=?", array($post['id']));
	}
	public function remove_product_by_id($id) {
		$this->load->database();
		$this->db->query("DELETE FROM `sacramento`.`products` WHERE `id`=?", array($id));
	}
	public function remove_box($post) {
		$this->load->database();
		$this->db->query("DELETE FROM `sacramento`.`boxes` WHERE `id`=?", array($post['id']));
	}
	public function get_product($id) {
		$this->load->database();
		return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
	}	
	public function get_box($id) {
		$this->load->database();
		return $this->db->query("SELECT * FROM boxes WHERE id = ?", array($id))->row_array();
	}
	public function update_product($post) {
		$this->load->database();
		$query = "UPDATE `sacramento`.`products` SET `name`=?, `description`=?, `box`=?, `updated_at`= NOW() WHERE `id`=?";
		$values = [$post['name'], $post['description'], $post['preselected_box'], $post['id']];
		$this->db->query($query, $values);
	}	
	public function update_box($post) {
		$this->load->database();
		$query = "UPDATE `sacramento`.`boxes` SET `name`=?, `description`=?, `price`=?, `item_amount`= ? WHERE `id`=?";
		$values = [$post['name'], $post['description'], $post['price'], $post['item_amount'], $post['id']];
		$this->db->query($query, $values);
	}



	// public function fetch_all_products()
	// {
	// 	$this->load->database();
	// 	return $this->db->query("SELECT * FROM products");
	// }


	// public function pagination_total_pages($item_per_page)
	// {
	// 	$get_total_rows = $this->db->query("SELECT count(*) FROM products");
	// 	return  ceil($get_total_rows[0]/$item_per_page);
	// }

	public function pagination_fetch_products_per_page($page_number, $item_per_page)
	{
		$this->load->database();

		//position of records
		$page_position = (($page_number - 1) * $item_per_page);

		//Fetch part of records using SQL LIMIT clause
        $position = ($page_number*$item_per_page);
        $this->load->database();
        $result_set = $this->db->query("SELECT * FROM products LIMIT ".$position.",".$item_per_page);	
    	return $result_set;
    }
	public function pagination_fetch_boxes_per_page($page_number, $item_per_page)
	{
		$this->load->database();

		//position of records
		$page_position = (($page_number - 1) * $item_per_page);

		//Fetch part of records using SQL LIMIT clause
        $position = ($page_number*$item_per_page);
        $this->load->database();
        $result_set = $this->db->query("SELECT * FROM boxes LIMIT ".$position.",".$item_per_page);	
    	return $result_set;
    }	

	// public function fetch_all_products()
	// {
	// 	$this->load->database();
	// 	return $this->db->query("SELECT * FROM products")->result_array();

	// }

	public function paginate($item_per_page, $current_page, $total_records, $total_pages)
	{
	    $pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	        $pagination .= '<ul class="pagination">';
	        
	        $right_links    = $current_page + 3; 
	        $previous       = $current_page - 3; //previous link 
	        $next           = $current_page + 1; //next link
	        $first_link     = true; //boolean var to decide our first link
	        
	        if($current_page > 1){
	            $previous_link = ($previous==0)?1:$previous;
	            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
	            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
	                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
	                    if($i > 0){
	                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
	                    }
	                }   
	            $first_link = false; //set first link to false
	        }
	        
	        if($first_link){ //if current active page is first link
	            $pagination .= '<li class="first active">'.$current_page.'</li>';
	        }elseif($current_page == $total_pages){ //if it's the last active link
	            $pagination .= '<li class="last active">'.$current_page.'</li>';
	        }else{ //regular current link
	            $pagination .= '<li class="active">'.$current_page.'</li>';
	        }
	                
	        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
	            if($i<=$total_pages){
	                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
	            }
	        }
	        if($current_page < $total_pages){ 
	                $next_link = ($i > $total_pages)? $total_pages : $i;
	                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
	                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
	        }
	        
	        $pagination .= '</ul>'; 
	    }
	    return $pagination; //return pagination links
	}
}
 ?>
