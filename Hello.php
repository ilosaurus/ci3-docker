class Blog_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function get()
        {
                $query = $this->db->get('m_parameter', 10);
                return $query->result();
        }

}
