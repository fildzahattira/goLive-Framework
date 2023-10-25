<?php
    class goLiveModel extends CI_Model{
        function __construct()
        {
            parent::__construct();
        }
        function getData_hosting()
        {
            return $this->db->get('hosting')->result();
        }
        function insertData_hosting($data)
        {
            $data_insert = array(
                'id_hosting' => $data['id_hosting'],
                'nama_hosting' => $data['nama_hosting'],
                'has_cpanel' => $data['has_cpanel'],
                'has_ssl' => $data['has_ssl'],
                'has_subdomain' => $data['has_subdomain'],
                'has_storage' => $data['has_storage'],
                'num_database' => $data['num_database'],
                'harga' => $data['harga']
            ); 

            $this->db->insert('hosting', $data_insert);
            return $this->db->affected_rows();
        }
        function get_one($id_hosting)
        {
            $this->db->where('id_hosting', $id_hosting);
            return $this->db->get('hosting')->result();
        }
        function updateData_hosting($data)
        {
            $data_update = array(
                'id_hosting' => $data['id_hosting'],
                'nama_hosting' => $data['nama_hosting'],
                'has_cpanel' => $data['has_cpanel'],
                'has_ssl' => $data['has_ssl'],
                'has_subdomain' => $data['has_subdomain'],
                'has_storage' => $data['has_storage'],
                'num_database' => $data['num_database'],
                'harga' => $data['harga']
            );

            $this->db->where('id_hosting', $data['id_hosting']);
            $this->db->update('hosting', $data_update);
            return $this->db->affected_rows();

        }
        function deleteData_Hosting($id_hosting)
        {
            $this->db->delete('hosting', array('id_hosting' => $id_hosting));
        }

        function getData_pembelian()
        {
            $this->db->select('pembelian.*, hosting.id_hosting AS id_hosting, hosting.nama_hosting');
            $this->db->join('hosting', 'hosting.id_hosting = pembelian.id_hosting');
            $this->db->from('pembelian');
            $this->db->order_by('k_pembelian', 'ASC');
            $query = $this->db->get();
            return $query->result();
        }
        function get_hostingID()
        {
            return $this->db->get('hosting')->result();
        }
        function cekDomain($domain) {
            $this->db->where('domain', $domain);
            $query = $this->db->get('pembelian'); 
            return $query->result();
        }
        function insertData_pembelian($data)
        {
     
            $data_insert = array(
                'k_pembelian' => $data['k_pembelian'],
                'nama_pembeli' => $data['nama_pembeli'],
                'alamat' => $data['alamat'],
                'domain' => $data['domain'],
                'jumlah_bayar' => $data['jumlah_bayar'],
                'lama_sewa' => $data['lama_sewa'],
                'id_hosting' => $data['id_hosting']
            ); 

            $this->db->insert('pembelian', $data_insert);
            return $this->db->affected_rows();
        }
        function updateData_pembelian($data)
        {
            $data_update = array(
                'k_pembelian' => $data['k_pembelian'],
                'nama_pembeli' => $data['nama_pembeli'],
                'alamat' => $data['alamat'],
                'domain' => $data['domain'],
                'jumlah_bayar' => $data['jumlah_bayar'],
                'lama_sewa' => $data['lama_sewa'],
                'id_hosting' => $data['id_hosting']
            );

            $this->db->where('k_pembelian', $data['k_pembelian']);
            $this->db->update('pembelian', $data_update);
            return $this->db->affected_rows();

        }
        function get_one_pembelian($k_pembelian)
        {
            $this->db->where('k_pembelian', $k_pembelian);
            return $this->db->get('pembelian')->result();
        }
        function deleteData_pembelian($k_pembelian)
        {
            $this->db->delete('pembelian', array('k_pembelian' => $k_pembelian));
        }
    }
