<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chatbot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Chat');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Daftar Pertanyaan';
            $data['admin'] = $this->M_Crud->get('admin');

            // $this->load->library('pagination');
            // $config['base_url'] = 'http://localhost/skripsi/chatbot/index';
            // $config['total_rows'] = $this->M_Chat->countAllChatbot();
            // //var_dump($config['total_rows']);
            // $config['per_page'] = 5;
            // //style
            // $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
            // $config['full_tag_close'] = '</ul></nav>';
            // $config['first_link'] = 'First';
            // $config['first_tag_open'] = '<li class="page-item">';
            // $config['first_tag_close'] = '</li>';
            // $config['last_link'] = 'Last';
            // $config['last_tag_open'] = '<li class="page-item">';
            // $config['last_tag_close'] = '</li>';
            // $config['next_link'] = '&raquo';
            // $config['next_tag_open'] = '<li class="page-item">';
            // $config['next_tag_close'] = '</li>';
            // $config['prev_link'] = '&laquo';
            // $config['prev_tag_open'] = '<li class="page-item">';
            // $config['prev_tag_close'] = '</li>';
            // $config['cur_tag_open'] = '<li class="page-item" active><a class="page-link" href="#">';
            // $config['cur_tag_close'] = '</a></li>';
            // $config['num_tag_open'] = '<li class="page-item">';
            // $config['num_tag_close'] = '</li>';
            // $config['attributes'] = array('class' => 'page-link');
            // //initialize
            // $this->pagination->initialize($config);
            // $data['start'] = $this->uri->segment(3);
            // $data['question'] = $this->M_Chat->getAllQuestion(5, $data['start']);

            $data['question'] = $this->M_Chat->getAllQuestion();

            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('chatbot/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'trim|required', [
            'required' => 'Pertanyaan harus diisi!'
        ]);
        $this->form_validation->set_rules('answer', 'Jawaban', 'trim|required', [
            'required' => 'Jawaban harus diisi!'
        ]);

        if ($this->session->userdata('email')) {
            if ($this->form_validation->run() == FALSE) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Tambah Data Question';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('chatbot/add', $data);
            } else {
                $data = [
                    'question' => strtolower($this->input->post('question')),
                    'answer' => strtolower($this->input->post('answer'))
                ];
                $this->M_Chat->inserChatData($data);
                redirect('chatbot');
            }
        } else {
            echo 'Failed';
        }
    }

    
    public function delete($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_Chat->deleteQuestionData($id);
            redirect('chatbot');
        } else {
            echo 'Failed';
        }
    }

    public function chat()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'History Chat';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/chatbot/chat/';
            $config['total_rows'] = $this->M_Chat->countAllChat();
            //var_dump($config['total_rows']);
            $config['per_page'] = 5;

            //style
            $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item" active><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            //initialize
            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(3);

            $data['history'] = $this->M_Chat->chat(5, $data['start']);

            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('chatbot/history', $data);
        } else {
            echo 'Failed';
        }
    }

    public function preproses($teks)
    {
        //menghilangkan tanda baca
        $teks = str_replace("'", " ", $teks);
	    $teks = str_replace("-", " ", $teks);
	    $teks = str_replace(")", " ", $teks);
	    $teks = str_replace("(", " ", $teks);
	    $teks = str_replace("\"", " ", $teks);
	    $teks = str_replace("/", " ", $teks);
	    $teks = str_replace("=", " ", $teks);
	    $teks = str_replace(".", " ", $teks);
	    $teks = str_replace(",", " ", $teks);
	    $teks = str_replace(":", " ", $teks);
	    $teks = str_replace(";", " ", $teks);
	    $teks = str_replace("!", " ", $teks);
        $teks = str_replace("?", " ", $teks);
        
        //ubah ke huruf kecil
        $teks=strtolower(trim($teks));

        //terapkan stop word removal
        $astoplist=array('yang', 'juga','dari','dia','kami','kamu','ini','itu','atau','dan','tersebut','pada','dengan','adalah','yaitu','di','ke');
        foreach($astoplist as $i =>$value){
            $teks= str_replace($astoplist[$i],'',$teks);
        }
        
        //terapkan stemming
    	//buka tabel tbstem dan bandingkan dengan berita
	    $restem = mysqli_query($konek,"SELECT * FROM tbstem ORDER BY Id");

    	while($rowstem = mysqli_fetch_array($restem)) {
  	    	$teks = str_replace($rowstem['Term'], $rowstem['Stem'], $teks);
  	    }

    	//kembalikan teks yang telah dipreproses
	    $teks = strtolower(trim($teks));
	    return $teks;
    }
    public function buatindex()
    {
        //hapus index sebelumnya
		mysqli_query($konek,"TRUNCATE TABLE tbindex");

		//ambil semua berita (teks)
		$resBerita = mysqli_query($konek,"SELECT * FROM tbberita ORDER BY Id");
		$num_rows = mysqli_num_rows($resBerita);
		print("Mengindeks sebanyak " . $num_rows . " dokumen. <br />");

		while($row = mysqli_fetch_array($resBerita)) {
			$docId = $row['Id'];
			$berita = $row['Berita'];

			//terapkan preprocessing
  			$berita = preproses($berita);

  			//simpan ke inverted index (tbindex)
  			$aberita = explode(" ", trim($berita));

  			foreach ($aberita as $j => $value) {
				//hanya jika Term tidak null atau nil, tidak kosong
				if ($aberita[$j] != "") {

					//berapa baris hasil yang dikembalikan query tersebut?
					$rescount = mysqli_query($konek,"SELECT Count FROM tbindex WHERE Term = '$aberita[$j]' AND DocId = $docId");
					$num_rows = mysqli_num_rows($rescount);

					//jika sudah ada DocId dan Term tersebut	, naikkan Count (+1)
					if ($num_rows > 0) {
						$rowcount = mysqli_fetch_array($rescount);
						$count = $rowcount['Count'];
						$count++;

						mysqli_query($konek,"UPDATE tbindex SET Count = $count WHERE Term = '$aberita[$j]' AND DocId = $docId");
					}
					//jika belum ada, langsung simpan ke tbindex
					else {
						mysqli_query($konek,"INSERT INTO tbindex (Term, DocId, Count) VALUES ('$aberita[$j]', $docId, 1)");
					}
				} //end if
			} //end foreach
  		} //end while
    }

    public function hitungbobot()
    {
        //berapa jumlah DocId total?, n
	$resn = mysqli_query($konek,"SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);

	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($konek,"SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];

		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($konek,"SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];

		$w = $tf * log($n/$NTerm);

		//update bobot dari term tersebut
		$resUpdateBobot = mysqli_query($konek,"UPDATE tbindex SET Bobot = $w WHERE Id = $id");
  	    } //end while $rowbobot
    }

    public function panjangvektor()
    {
        //hapus isi tabel tbvektor
        mysqli_query($konek,"TRUNCATE TABLE tbvektor");

        //ambil setiap DocId dalam tbindex
        //hitung panjang vektor untuk setiap DocId tersebut
        //simpan ke dalam tabel tbvektor
        $resDocId = mysqli_query($konek,"SELECT DISTINCT DocId FROM tbindex");

        $num_rows = mysqli_num_rows($resDocId);
        print("Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");

        while($rowDocId = mysqli_fetch_array($resDocId)) {
            $docId = $rowDocId['DocId'];

            $resVektor = mysqli_query($konek,"SELECT Bobot FROM tbindex WHERE DocId = $docId");

            //jumlahkan semua bobot kuadrat
            $panjangVektor = 0;
            while($rowVektor = mysqli_fetch_array($resVektor)) {
                $panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];
            }

            //hitung akarnya
            $panjangVektor = sqrt($panjangVektor);

            //masukkan ke dalam tbvektor
            $resInsertVektor = mysqli_query($konek,"INSERT INTO tbvektor (DocId, Panjang) VALUES ($docId, $panjangVektor)");
	    } //end while $rowDocId
    }

    function hitungsim($query) 
    {
        //ambil jumlah total dokumen yang telah diindex (tbindex atau tbvektor), n
        $resn = mysqli_query($konek,"SELECT Count(*) as n FROM tbvektor");
        $rown = mysqli_fetch_array($resn);
        $n = $rown['n'];
    
        //terapkan preprocessing terhadap $query
        $aquery = explode(" ", $query);
    
        //hitung panjang vektor query
        $panjangQuery = 0;
        $aBobotQuery = array();
    
        for ($i=0; $i<count($aquery); $i++) {
            //hitung bobot untuk term ke-i pada query, log(n/N);
            //hitung jumlah dokumen yang mengandung term tersebut
            $resNTerm = mysqli_query($konek,"SELECT Count(*) as N from tbindex WHERE Term = '$aquery[$i]'");
            $rowNTerm = mysqli_fetch_array($resNTerm);
            $NTerm = $rowNTerm['N'] ;
        //$idf = 0;
        $idf = 0;
        if($NTerm > 0)
            $idf = log($n/$NTerm);
    
            //simpan di array
            $aBobotQuery[] = $idf;
    
            $panjangQuery = $panjangQuery + $idf * $idf;
        }
    
        $panjangQuery = sqrt($panjangQuery);
    
        $jumlahmirip = 0;
    
        //ambil setiap term dari DocId, bandingkan dengan Query
        $resDocId = mysqli_query("SELECT * FROM tbvektor ORDER BY DocId");
        while ($rowDocId = mysqli_fetch_array($resDocId)) {
    
            $dotproduct = 0;
    
            $docId = $rowDocId['DocId'];
            $panjangDocId = $rowDocId['Panjang'];
    
            $resTerm = mysqli_query("SELECT * FROM tbindex WHERE DocId = $docId");
            while ($rowTerm = mysqli_fetch_array($resTerm)) {
                for ($i=0; $i<count($aquery); $i++) {
                    //jika term sama
                    if ($rowTerm['Term'] == $aquery[$i]) {
                        $dotproduct = $dotproduct + $rowTerm['Bobot'] * $aBobotQuery[$i];
                    } //end if
                } //end for $i
            } //end while ($rowTerm)
    
            if ($dotproduct > 0) {
                $sim = $dotproduct / ($panjangQuery * $panjangDocId);
    
                //simpan kemiripan > 0  ke dalam tbcache
                $resInsertCache = mysqli_query($konek,"INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', $docId, $sim)");
                $jumlahmirip++;
                
            }
    
    
        } //end while $rowDocId
    
        if ($jumlahmirip == 0) {
            $resInsertCache = mysqli_query($konek,"INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', 0, 0)");
        }
    
    }

    function ambilcache($keyword) 
    {
        $resCache = mysqli_query("SELECT*FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
        $num_rows = mysqli_num_rows($resCache);
    
        if ($num_rows >0) {
            //tampilkan semua berita yang telah terurut
            while ($rowCache = mysqli_fetch_array($resCache)) {
                $docId = $rowCache['DocId'];
                $sim = $rowCache['Value'];
    
                if ($docId != 0) {
                    //ambil berita dari tabel tbberita, tampilkan
                    $resBerita = mysqli_query($konek,"SELECT * FROM tbberita WHERE Id = $DocId");
                    $rowBerita = mysqli_fetch_array($resBerita);
    
                    $judul = $rowBerita['Judul'];
                    $berita = $rowBerita['Berita'];
                    $beritaa = $docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />";
                    print ($beritaa);
                    // print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
                    print($berita . "<hr />");
                } else {
                    print("<b>Tidak ada... </b><hr />");
                }
            }//end while (rowCache = mysqli_fetch_array($resCache))
        }//end if $num_rows>0
        else {
            hitungsim($keyword);
    
            //pasti telah ada dalam tbcache
            $resCache = mysqli_query($konek,"SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
            $num_rows = mysqli_num_rows($resCache);
    
            while ($rowCache = mysqli_fetch_array($resCache)) {
                $docId = $rowCache['DocId'];
                $sim = $rowCache['Value'];
    
                if ($docId != 0) {
                    //ambil berita dari tabel tbberita, tampilkan
                    $resBerita = mysqli_query($konek,"SELECT * FROM tbberita WHERE Id = $docId");
                    $rowBerita = mysqli_fetch_array($resBerita);
    
                    $judul = $rowBerita['Judul'];
                    $berita = $rowBerita['Berita'];
    
                    print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
                    print($berita . "<hr />");
                } else {
                    print("<b>Tidak ada... </b><hr />");
                }
            }
        }
    }
}
