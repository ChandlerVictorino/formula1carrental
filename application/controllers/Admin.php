<?php
defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Email $email
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * // Add your model(s)
 * @property m_rental $m_rental
 */

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        //for login
        if($this->session->userdata('status') != 'login'){
            redirect(base_url().'welcome?message=notlogin');
        }
    }
    
    //function for dashboard admin
    function index(){
        $data['transaction'] = $this->db->query("select * from transaction,mobile,customer where transaction_mobile=mobile_id and transaction_customer=customer_id order by transaction_id desc limit 10")->result(); //transaction terakhir
        $data['customer'] = $this->db->query("select * from customer order by customer_id desc limit 3")->result(); //menampilkan custumer baru
        $data['mobile'] = $this->db->query("select * from mobile order by mobile_id desc limit 3")->result(); //menampilkan mobile baru
        $this->load->view('admin/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer');
    }
    
    //function for  password
    function ganti_password(){
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }
    function ganti_password_act(){
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');
        
        $this->form_validation->set_rules('pass_baru','Password baru','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi password baru','required');
        
        if($this->form_validation->run() != false){
            $data   = array('admin_password' => md5($pass_baru));
            $w      = array('admin_id' => $this->session->userdata('id'));
            $this->m_rental->update_data($w,$data,'admin');
            redirect(base_url().'admin/ganti_password?message=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }
    
    //function logout
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?message=logout');
    }
    
    //function CRUD Mobile
    function mobile(){
        $data['mobile'] = $this->m_rental->get_data('mobile')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mobile',$data);
        $this->load->view('admin/footer');
    }
    function mobile_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/mobile_add');
        $this->load->view('admin/footer');
    }
    function mobile_add_act(){
        $carname   = $this->input->post('carname');
        $plate   = $this->input->post('plate');
        $color  = $this->input->post('color');
        $year  = $this->input->post('year');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('carname','Carname mobile','required');
        $this->form_validation->set_rules('status','Status mobile','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'mobile_carname'    => $carname,
                'mobile_plate'    => $plate,
                'mobile_color'   => $color,
                'mobile_year'   => $year,
                'mobile_status'  => $status
            );
            
            $this->m_rental->insert_data($data, 'mobile');
            redirect(base_url().'admin/mobile');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/mobile_add');
            $this->load->view('admin/footer');
        }
    }

    function mobile_edit($id){
        $where = array('mobile_id' => $id);
        $data['mobile'] = $this->m_rental->edit_data($where,'mobile')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mobile_edit',$data);
        $this->load->view('admin/footer');
    }
    function mobile_update(){
        $id     = $this->input->post('id');
        $carname   = $this->input->post('carname');
        $plate   = $this->input->post('plate');
        $color  = $this->input->post('color');
        $year  = $this->input->post('year');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('carname','Carname mobile','required');
        $this->form_validation->set_rules('status','Status mobile','required');
        
        if($this->form_validation->run() != false){
            $where = array('mobile_id' => $id);
            $data = array(
                'mobile_carname'    => $carname,
                'mobile_plate'    => $plate,
                'mobile_color'   => $color,
                'mobile_year'   => $year,
                'mobile_status'  => $status
            );
            
            $this->m_rental->update_data($where, $data, 'mobile');
            redirect(base_url().'admin/mobile');
        } else {
            $where = array('mobile_id' => $id);
            $data['mobile'] = $this->m_rental->edit_data($where,'mobile')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/mobile_edit',$data);
            $this->load->view('admin/footer');
        }
    }
    public function mobile_hapus($id){
        $where = array('mobile_id' => $id);
        $this->m_rental->delete_data($where, 'mobile');
        redirect('admin/mobile');
    
    
    }
    
    //fungsi CRUD customer
    function customer(){
        $data['customer'] = $this->m_rental->get_data('customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer',$data);
        $this->load->view('admin/footer');
    }
    function customer_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/customer_add');
        $this->load->view('admin/footer');
    }
    function customer_add_act(){
        $name  = $this->input->post('name');
        $address = $this->input->post('address');
        $gender     = $this->input->post('gender');
        $hp     = $this->input->post('hp');
        $ktp    = $this->input->post('ktp');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('ktp','ID card no.','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'customer_name' => $name,
                'customer_address' => $address,
                'customer_gender'   => $gender,
                'customer_hp'   => $hp,
                'customer_ktp'  => $ktp
            );
            
            $this->m_rental->insert_data($data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/customer_add');
            $this->load->view('admin/footer');
        }
    }
    function customer_edit($id){
        $where = array('customer_id' => $id);
        $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer_edit',$data);
        $this->load->view('admin/footer');
    }
    function customer_update(){
        $id     = $this->input->post('id');
        $name   = $this->input->post('name');
        $address = $this->input->post('address');
        $gender     = $this->input->post('gender');
        $hp     = $this->input->post('hp');
        $ktp    = $this->input->post('ktp');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('ktp','Nomor KTP','required');
        
        if($this->form_validation->run() != false){
            $where = array('customer_id' => $id);
            $data = array(
                'customer_name' => $name,
                'customer_address' => $address,
                'customer_gender'   => $gender,
                'customer_hp'   => $hp,
                'customer_ktp'  => $ktp
            );
            
            $this->m_rental->update_data($where, $data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $where = array('customer_id' => $id);
            $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/customer_edit',$data);
            $this->load->view('admin/footer');
        }
    }
    public function customer_hapus($id){
        $where = array('customer_id' => $id);
        $this->m_rental->delete_data($where, 'customer');
        redirect('admin/customer');
    
    }
    
    //fungsi-fungsi transaction
    function transaction(){
        $data['transaction'] = $this->db->query("select * from transaction,mobile,customer where transaction_mobile=mobile_id and transaction_customer=customer_id")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaction', $data);
        $this->load->view('admin/footer');
    }
    function transaction_add(){
        $w = array('mobile_status' => 1);
        $data['mobile'] = $this->m_rental->edit_data($w,'mobile')->result();
        $data['customer'] = $this->m_rental->get_data('customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaction_add', $data);
        $this->load->view('admin/footer');
    }
    function transaction_add_act(){
        $customer   = $this->input->post('customer');
        $mobile      = $this->input->post('mobile');
        $tgl_borrow = $this->input->post('tgl_borrow');
        $tgl_return = $this->input->post('tgl_return');
        $price      = $this->input->post('price');
        $fine      = $this->input->post('fine');
        
        $this->form_validation->set_rules('customer', 'customer', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('tgl_borrow', 'Date Borrow', 'required');
        $this->form_validation->set_rules('tgl_return', 'Date Return', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('fine', 'fine', 'required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'transaction_employee'    => $this->session->userdata('id'),
                'transaction_customer'    => $customer,
                'transaction_mobile'       => $mobile,
                'transaction_tgl_borrow'  => $tgl_borrow,
                'transaction_tgl_return' => $tgl_return,
                'transaction_price'       => $price,
                'transaction_fine'       => $fine,
                'transaction_tgl'         => date('Y-m-d')
            );
            
            $this->m_rental->insert_data($data, 'transaction');
            
            //update status mobile status
            $d = array('mobile_status' => 2);
            $w = array('mobile_id' => $mobile);
            $this->m_rental->update_data($w, $d, 'mobile');
            
            redirect(base_url().'admin/transaction');
        } else {
            $d = array('mobile_status' => 1);
            $data['mobile'] = $this->m_rental->get_data('mobile')->result(); // fetch all cars
            $data['customer'] = $this->m_rental->get_data('customer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/transaction_add', $data);
            $this->load->view('admin/footer');
        }
        
    }
    function transaction_hapus($id){
        $w      = array('transaction_id' => $id);
        $data   = $this->m_rental->edit_data($w,'transaction')->row();
        
        $w2     = array('mobile_id' => $data->transaction_mobile);
        $data2  = array('mobile_status' => 1);
        $this->m_rental->update_data($w2,$data2,'mobile');
        $this->m_rental->delete_data($w,'transaction');
        redirect(base_url().'admin/transaction');
    }
    function transaction_selesai($id){
        $data['mobile']      = $this->m_rental->get_data('mobile')->result();
        $data['customer']   = $this->m_rental->get_data('customer')->result();
        $data['transaction']  = $this->db->query("select * from transaction,mobile,customer where transaction_mobile=mobile_id and transaction_customer=customer_id and transaction_id='$id'")->result();
        
        $this->load->view('admin/header');
        $this->load->view('admin/transaction_selesai',$data);
        $this->load->view('admin/footer');
    }
    function transaction_selesai_act(){
        $id                 = $this->input->post('id');
        $tgl_returned   = $this->input->post('tgl_returned');
        $tgl_return        = $this->input->post('tgl_return');
        $mobile              = $this->input->post('mobile');
        $fine              = $this->input->post('fine');
        
        $this->form_validation->set_rules('tgl_returned','Date pengembalian','required');
        
        if($this->form_validation->run() != false){
            //hitung selisih hari
            $batas_return  = strtotime($tgl_return);
            $returned   = strtotime($tgl_returned);
            $selisih        = abs(($batas_return - $returned)/(60*60*24));
            $total_fine    = $fine * $selisih;
            
            //update status transaction
            $data = array(
                'transaction_tglreturned' => $tgl_returned,
                'transaction_status'          => 1,
                'transaction_totalfine'      => $total_fine
            );
            
            $w = array('transaction_id' => $id);
            $this->m_rental->update_data($w,$data,'transaction');
            
            //update status mobile
            $data2 = array('mobile_status' => 1);
            $w2 = array('mobile_id' => $mobile);
            $this->m_rental->update_data($w2,$data2,'mobile');
            redirect(base_url().'admin/transaction');
        } else {
            $data['mobile']      = $this->m_rental->get_data('mobile')->result();
            $data['customer']   = $this->m_rental->get_data('customer')->result();
            $data['transaction']  = $this->db->query("select * from transaction,mobile,customer where transaction_mobile=mobile_id and transaction_customer=customer_id and transaction_id='$id'")->result();
            
            $this->load->view('admin/header');
            $this->load->view('admin/transaction_selesai',$data);
            $this->load->view('admin/footer');
        }
    }
    
    //fungsi-fungsi pelaporan
    function laporan(){
        $this->load->view('admin/header');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer');
    }
    
    //fungsi CRUD User
    function user(){
        $this->load->view('admin/header');
        $this->load->view('admin/user');
        $this->load->view('admin/footer');
    }
}
?>