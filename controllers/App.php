<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('empmodel');
        $this->load->model('Dash');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    public function addemp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2000;
            $config['max_width'] = 4096;
            $config['max_height'] = 4096;

            $this->load->library('upload', $config);

            $file_names = array();

            $file_inputs = array('aadhar', 'tenth', 'twelve', 'higherqual');

            foreach ($file_inputs as $file_input) {
                if (!$this->upload->do_upload($file_input)) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                } else {
                    $file_data = $this->upload->data();
                    $file_names[$file_input] = $file_data['file_name'];
                }
            }

            $employee_data = array(
                'etype' => $this->input->post('etype'),
                'prefix' => $this->input->post('prefix'),
                'efname' => $this->input->post('efname'),
                'elname' => $this->input->post('elname'),
                'cname' => $this->input->post('cname'),
                'degree' => $this->input->post('degree'),
                'dyear' => $this->input->post('dyear'),
                'eemail' => $this->input->post('eemail'),
                'pass' => $this->input->post('pass'),
                'eworkno' => $this->input->post('eworkno'),
                'ephnno' => $this->input->post('ephnno'),
                'edesig' => $this->input->post('edesig'),
                'eexp' => $this->input->post('eexp'),
                'doj' => $this->input->post('doj'),
                'attent' => $this->input->post('attent'),
                'country' => $this->input->post('country'),
                'ast1' => $this->input->post('ast1'),
                'ast2' => $this->input->post('ast2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'fax' => $this->input->post('fax'),
                'aadhar' => $file_names['aadhar'],
                'tenth' => $file_names['tenth'],
                'twelve' => $file_names['twelve'],
                'higherqual' => $file_names['higherqual']
            );

            $status = $this->empmodel->insertEmp($employee_data);

            if ($status == true) {
                redirect(base_url('index.php/App/manageEmployee'));
            } else {
                echo "Failed to insert data into database";
            }
        } else {
            $this->load->view('emp');
        }
    }

    public function editemp($eid)
    {

        $data['employees'] = $this->empmodel->getemp($eid);
        $data['eid'] = $eid;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update_data = array(
                'etype' => $this->input->post('etype'),
                'prefix' => $this->input->post('prefix'),
                'efname' => $this->input->post('efname'),
                'elname' => $this->input->post('elname'),
                'cname' => $this->input->post('cname'),
                'degree' => $this->input->post('degree'),
                'dyear' => $this->input->post('dyear'),
                'eemail' => $this->input->post('eemail'),
                'pass' => $this->input->post('pass'),
                'eworkno' => $this->input->post('eworkno'),
                'ephnno' => $this->input->post('ephnno'),
                'edesig' => $this->input->post('edesig'),
                'eexp' => $this->input->post('eexp'),
                'doj' => $this->input->post('doj'),
                'attent' => $this->input->post('attent'),
                'country' => $this->input->post('country'),
                'ast1' => $this->input->post('ast1'),
                'ast2' => $this->input->post('ast2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'fax' => $this->input->post('fax')
            );

            if (!empty($_FILES['newdoc']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
                $config['max_size'] = 5125;

                $this->load->library('upload', $config);

                // if ($this->upload->do_upload('newaadhar')) {
                //     $upload_data = $this->upload->data();
                //     $update_data['aadhar'] = $upload_data['file_name'];
                // } else {
                //     $error = array('error' => $this->upload->display_errors());
                //     $data['row'] = $this->empmodel->getemp($eid);
                //     $this->load->view('manageEmployee', $error);
                //     return;
                // }
            }

            $update_result = $this->empmodel->editemp($update_data, $eid);

            if ($update_result == true) {
                redirect(base_url('index.php/App/manageEmployee'));
            } else {
                echo "Update failed. Please try again.";
            }
        } else {
            $this->load->view('manageEmployee', $data);
        }
    }

    public function deleteemp($eid)
    {
        if (is_numeric($eid)) {
            $employee = $this->empmodel->getEmployeeById($eid);
            if ($employee) {
                $file_name = $employee->doc;
                $file_path = './uploads/' . $file_name;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $status = $this->empmodel->deleteemp($eid);

                if ($status == true) {
                    redirect(base_url('index.php/App/manageEmployee'));
                } else {
                    $this->load->view('index.php/App/manageEmployee');
                }
            } else {
                echo "Employee record not found.";
            }
        } else {
            echo "Invalid employee ID.";
        }
    }

    public function index()
    {
        $data['employees'] = $this->empmodel->getEmps();
        $data['employee_count'] = $this->empmodel->get_employee_count();
        $data['task_count'] = $this->empmodel->get_task_count();
        $data['checked_in_count'] = $this->Dash->getCheckedInCount();
        $data['checked_out_count'] = $this->Dash->getCheckedOutCount();
        $this->load->view('index', $data);
    }

    public function manageEmployee()
    {
        $data['employees'] = $this->empmodel->getData();
        $this->load->view('manageEmployee', $data);
    }

    public function emp2()
    {
        $this->load->view('emp');
    }

    public function empinternletter()
    {
        $eid = $this->session->userdata('eid');

        $this->load->model('empmodel');

        $employee = $this->empmodel->getEmpsById($eid);

        if ($employee) {
            $sendto = $this->empmodel->getSendToDetailsByEmail($employee->eemail);

            $data = array(
                'employees' => $employee,
                'sendto' => $sendto
            );

            $this->load->view('empinternletter', $data);
        } else {
            redirect('');
        }
    }

    public function empexpletter()
    {
        $eid = $this->session->userdata('eid');

        $this->load->model('empmodel');

        $employee = $this->empmodel->getEmpsById($eid);
        if ($employee) {
            $sendexpto = $this->empmodel->getSendToDetailsByEmailID($employee->eemail);
            // $sendto = $this->empmodel->getSendToDetailsByEmail($employee->eemail);
            $data = array(
                'employees' => $employee,
                'sendexpto' => $sendexpto,
                // 'sendto' => $sendto
            );
            // $data['sendexpto'] = $this->empmodel->getSendExpToDataWithLetterYes();
            $this->load->view('empexpletter', $data);
        } else {
            redirect('');
        }
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if (empty($username) || empty($password)) {
                $this->session->set_flashdata('error', 'Username or Password is missing.');
                $this->load->view('login');
                return;
            }

            $admin = $this->empmodel->checkAdminLogin($username, $password);

            if ($admin) {
                $this->session->set_userdata('id', $admin->admin_id);
                redirect(base_url('index.php/App/index'));
            }

            $employee = $this->empmodel->checkEmployeeLogin($username, $password);

            $userLogin = $this->session->userdata('eid');
            if ($userLogin == null || empty($userLogin) || $userLogin == $employee->eid) {
                if ($employee) {
                    $this->session->set_userdata('eid', $employee->eid);
                    redirect(base_url('index.php/App/empdashboard'));
                }
            } else {
                $this->session->set_flashdata('error', 'Already User Login On this System.');
                $this->load->view('login');
                return;
            }


            $this->session->set_flashdata('error', 'Incorrect Username or Password.');
            $this->load->view('login');
            return;
        }

        $this->load->view('login');
    }

    public function profile()
    {
        $eid = $this->session->userdata('eid');
        $data['profile_data'] = $this->empmodel->getprofiledata($eid);
        $this->load->view('profile', $data);
    }

    public function updateProfile($eid)
    {
        $data['employees'] = $this->empmodel->getprofile($eid);
        $data['eid'] = $eid;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2000;
            $config['max_width'] = 4096;
            $config['max_height'] = 4096;

            $this->load->library('upload', $config);

            $file_names = array();

            $file_inputs = array('aadhar', 'tenth', 'twelve', 'higherqual');
            foreach ($file_inputs as $file_input) {
                if (!empty($_FILES[$file_input]['name'])) {
                    if (!$this->upload->do_upload($file_input)) {
                        $error = $this->upload->display_errors();
                        echo $error;
                        return;
                    } else {
                        $file_data = $this->upload->data();
                        $file_names[$file_input] = $file_data['file_name'];
                    }
                }
            }
            $update_data = array(
                'etype' => $this->input->post('etype'),
                'prefix' => $this->input->post('prefix'),
                'efname' => $this->input->post('efname'),
                'elname' => $this->input->post('elname'),
                'cname' => $this->input->post('cname'),
                'degree' => $this->input->post('degree'),
                'dyear' => $this->input->post('dyear'),
                'eemail' => $this->input->post('eemail'),
                'pass' => $this->input->post('pass'),
                'eworkno' => $this->input->post('eworkno'),
                'ephnno' => $this->input->post('ephnno'),
                'edesig' => $this->input->post('edesig'),
                'eexp' => $this->input->post('eexp'),
                'doj' => $this->input->post('doj'),
                'attent' => $this->input->post('attent'),
                'country' => $this->input->post('country'),
                'ast1' => $this->input->post('ast1'),
                'ast2' => $this->input->post('ast2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'fax' => $this->input->post('fax'),
            );

            foreach ($file_names as $key => $value) {
                $update_data[$key] = $value;
            }

            $update_result = $this->empmodel->editprofile($update_data, $eid);

            if ($update_result == true) {
                redirect(base_url('index.php/App/profile'));
            } else {
                echo "Update failed. Please try again.";
            }
        } else {
            $this->load->view('profile', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('eid');
        echo '<html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "You will be logged out",
            icon: "warning",
            buttons: true,
            dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login"; 
                    }
                });
            </script>
        </body>
        </html>';
    }

    public function addtask()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = array(
                'pname' => $this->input->post('pname'),
                'tname' => $this->input->post('tname'),
                'due_date' => $this->input->post('due_date'),
                'description' => $this->input->post('description'),
                'assign_to' => $this->input->post('assign_to'),
                'status' => $this->input->post('status')
            );

            $status = $this->empmodel->insert_task($task);

            if ($status == true) {
                redirect(base_url('index.php/App/rtask'));
            } else {
                echo "Failed to insert data into database";
            }
        } else {
            $this->load->view('rtask');
        }
    }

    public function rtask()
    {
        $data['task'] = $this->empmodel->get_all_tasks();
        $data['employees'] = $this->empmodel->getEmployees();
        $this->load->view('rtask', $data);
    }

    public function deletetask($tid)
    {
        if (is_numeric($tid)) {
            $task = $this->empmodel->getEmployeeById($tid);

            $status = $this->empmodel->deletetask($tid);

            if ($status == true) {
                redirect(base_url('index.php/App/rtask'));
            } else {
                $this->load->view('index.php/App/rtask');
            }
        } else {
            echo "Employee record not found.";
        }
    }

    public function updatetask($tid)
    {
        $data['task'] = $this->empmodel->gettask($tid);
        $data['employees'] = $this->empmodel->getAllEmployees();
        $data['tid'] = $tid;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update_task = array(
                'pname' => $this->input->post('pname'),
                'tname' => $this->input->post('tname'),
                'due_date' => $this->input->post('due_date'),
                'description' => $this->input->post('description'),
                'assign_to' => $this->input->post('assign_to'),
                'status' => $this->input->post('status')
            );

            $update_result = $this->empmodel->edittask($update_task, $tid);

            if ($update_result == true) {
                redirect(base_url('index.php/App/rtask'));
            } else {
                echo "Update failed. Please try again.";
            }
        } else {
            $this->load->view('rtask', $data);
        }
    }


    public function jpost()
    {
        // $this->load->view('jpost');
        $data['Jpost'] = $this->empmodel->getJpost();
        $this->load->view('jpost', $data);
    }

    public function jpostadd()
    {
        if (isset($_POST['addjob'])) {
            $data = [
                'jtitle' => $this->input->post('jtitle'),
                'jdes' => $this->input->post('jdes'),
                'jvac' => $this->input->post('jvac'),
                'jdate' => $this->input->post('jdate'),
                'jstatus' => $this->input->post('jstatus')
            ];

            $res = $this->empmodel->jAdd($data);

            if ($res == TRUE) {
                $this->session->set_flashdata('success', 'Job Post Added Successfully');
                redirect(base_url('index.php/App/jpost'));
                // $this->load->view('jpost');
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong!!!');
                redirect(base_url('jpost'));
            }
        }
    }

    public function jpostupdate($jid)
    {
        $this->load->view('jpost');
        $data['job'] = $this->empmodel->getJob($jid);
        $data['jid'] = $jid;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update_jpost = array(
                'jtitle' => $this->input->post('jtitle'),
                'jdes' => $this->input->post('jdes'),
                'jvac' => $this->input->post('jvac'),
                'jdate' => $this->input->post('jdate'),
                'jstatus' => $this->input->post('jstatus')
            );
            $update_res = $this->empmodel->editJpost($update_jpost, $jid);
            if ($update_res == true) {
                $this->session->set_flashdata('success', 'Job Post Updated Successfully');
                redirect(base_url('index.php/App/jpost'));
                // $this->load->view('jpost');
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong!!!');
                redirect(base_url('jpost'));
            }
        }
    }

    public function deletejpost($jid)
    {
        if (is_numeric($jid)) {
            $status = $this->empmodel->deljpost($jid);
            if ($status == true) {
                $this->session->set_flashdata('success', 'Job Post Successfully Deleted');
                redirect(base_url('index.php/App/jpost'));
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong');
                $this->load->view('index.php/App/jpost');
            }
        }
    }

    public function japp()
    {
        $data['jApp'] = $this->empmodel->getJapp();
        $this->load->view('japp', $data);
    }

    public function jappAdd()
    {
        if (isset($_POST['adduser'])) {
            $data = [
                'utitle' => $this->input->post('utitle'),
                'uname' => $this->input->post('uname'),
                'umail' => $this->input->post('umail'),
                'umob' => $this->input->post('umob'),
                'uapply' => $this->input->post('uapply')
            ];

            $res = $this->empmodel->insertApp($data);

            if ($res == TRUE) {
                $this->session->set_flashdata('success', 'Job Application Added Successfully');
                redirect(base_url('index.php/App/japp'));
                // $this->load->view('jpost');
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong!!!');
                redirect(base_url('japp'));
            }
        }
    }

    public function EditJapp($id)
    {
        $this->load->view('japp');
        $data['Japp'] = $this->empmodel->getJapp($id);
        $data['id'] = $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update_japp = array(
                'utitle' => $this->input->post('utitle'),
                'uname' => $this->input->post('uname'),
                'umail' => $this->input->post('umail'),
                'umob' => $this->input->post('umob'),
                'uapply' => $this->input->post('uapply')
            );
            $update_res = $this->empmodel->editJapp($update_japp, $id);
            if ($update_res == true) {
                $this->session->set_flashdata('success', 'Job Application Updated Successfully');
                redirect(base_url('index.php/App/japp'));
                // $this->load->view('jpost');
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong!!!');
                redirect(base_url('japp'));
            }
        }
    }

    public function deleteJapp($id)
    {
        if (is_numeric($id)) {
            $status = $this->empmodel->deljApp($id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'Job Application Successfully Deleted');
                redirect(base_url('index.php/App/japp'));
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong');
                $this->load->view('index.php/App/japp');
            }
        }
    }

    //     public function jpost_pdf()
    //     {
    //         $Jpost = $this->empmodel->getJpost();
    //         require_once(APPPATH . 'helpers/tcpdf/tcpdf.php');
    //         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //         $pdf->setTitle('CodeWorld');
    //         $pdf->AddPage();
    //         $html = '<style>
    //     table {
    //         width: 100%;
    //         border-collapse: collapse;
    //     }
    //     th, td {
    //         padding: 8px;
    //         text-align: left;
    //         border: 1px solid #ccc;
    //     }
    //     .info {
    //         background-color: #f2f2f2;
    //     }
    //     tbody tr:nth-child(even) {
    //         background-color: #f9f9f9;
    //     }
    // </style>';
    //         $html = '<img src="assets/CWLOGO.jpg" style="width: 200px; height: 100px"><br><br>';
    //         $html .= '<table cellpadding="4" border="1">
    //             <thead>
    //                 <tr class="info">
    //                     <th>Job Title</th>
    //                     <th>Designation</th>
    //                     <th>Vacancy</th>
    //                     <th>Last Date</th>
    //                     <th>Status</th>
    //                 </tr>
    //             </thead>
    //             <tbody>';
    //         foreach ($Jpost as $j) {
    //             $html .= '<tr>
    //                       <td>' . $j->jtitle . '</td>
    //                       <td>' . $j->jdes . '</td>
    //                       <td>' . $j->jvac . '</td>
    //                       <td>' . $j->jdate . '</td>
    //                       <td>' . $j->jstatus . '</td>
    //                   </tr>';
    //         }
    //         $html .= '</tbody></table>';

    //         $pdf->writeHTML($html);
    //         $pdf->Output('jobpost.pdf', 'I');
    //     }

    //     public function japp_pdf()
    //     {
    //         $jApp = $this->empmodel->getJapp();
    //         require_once(APPPATH . 'helpers/tcpdf/tcpdf.php');
    //         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //         $pdf->setTitle('CodeWorld');
    //         $pdf->AddPage();
    //         $html = '<style>
    //     table {
    //         width: 100%;
    //         border-collapse: collapse;
    //     }
    //     th, td {
    //         padding: 8px;
    //         text-align: left;
    //         border: 1px solid #ccc;
    //     }
    //     .info {
    //         background-color: #f2f2f2;
    //     }
    //     tbody tr:nth-child(even) {
    //         background-color: #f9f9f9;
    //     }
    // </style>';
    //         $html = '<img src="assets/CWLOGO.jpg" style="width: 200px; height: 100px"><br><br>';
    //         $html .= '<table cellpadding="4" border="1">
    //             <thead>
    //                 <tr class="info">
    //                     <th>Job Title</th>
    //                     <th>User Name</th>
    //                     <th>Email</th>
    //                     <th>Mobile</th>
    //                     <th>Apply On</th>
    //                 </tr>
    //             </thead>
    //             <tbody>';
    //         foreach ($jApp as $j) {
    //             $html .= '<tr>
    //                       <td>' . $j->utitle . '</td>
    //                       <td>' . $j->uname . '</td>
    //                       <td>' . $j->umail . '</td>
    //                       <td>' . $j->umob . '</td>
    //                       <td>' . $j->uapply . '</td>
    //                   </tr>';
    //         }
    //         $html .= '</tbody></table>';

    //         $pdf->writeHTML($html);
    //         $pdf->Output('jobapp.pdf', 'I');
    //     }

    public function fetchEmployees()
    {
        $employees = $this->empmodel->getEmployees();
        echo json_encode($employees);
    }

    public function genletter()
    {
        $this->load->view('genletter');
    }

    public function generateLetter()
    {
        $efname = $this->input->post('efname');
        $letter_type = $this->input->post('letter_type');

        log_message('debug', 'Received emp_name: ' . $efname);
        log_message('debug', 'Received letter_type: ' . $letter_type);

        if ($efname && $letter_type) {
            $data['employees'] = $this->empmodel->getEmpByName($efname);
            if ($data['employees']) {
                switch ($letter_type) {
                    case 'Internship letter':
                        $this->load->view('internletter', $data);
                        break;
                    case 'Internship Certificate':
                        $this->load->view('internexp', $data);
                        break;
                    default:
                        show_error('Invalid letter type selected');
                }
            } else {
                show_error('Employee not found');
            }
        } else {
            show_error('Employee name or letter type missing');
        }
    }

    public function internletter()
    {
        $efname = $this->input->post('efname');
        if ($efname) {
            log_message('debug', 'Received employee first name: ' . $efname);
            $data['name'] = $this->empmodel->get_employee_details($efname);

            if ($data['name']) {
                log_message('debug', 'Employee data: ' . print_r($data['name'], true));
            } else {
                log_message('error', 'No data found for employee first name: ' . $efname);
            }

            $this->load->view('internletter', $data);
        } else {
            $data['name'] = null;
            log_message('error', 'Employee first name not provided');
            $this->load->view('internletter', $data);
        }
    }

    public function internexp()
    {
        $this->load->view('internexp');
    }

    public function fetch_letter()
    {
        $employee_efname = $this->input->post('employee_efname');
        $employee_elname = $this->input->post('employee_elname');

        // Fetch employee details including email
        $employee = $this->empmodel->get_employee_by_name($employee_efname, $employee_elname);

        if ($employee) {
            // Debug: Check if data is received correctly
            log_message('debug', 'Employee details: ' . print_r($employee, true));

            // Example: Retrieve email address
            $employee_email = $employee->email; // Assuming 'email' is the field name in your database

            // Use $employee_email as needed (e.g., send email)
            echo "Employee email: " . $employee_email;
        } else {
            echo "Employee not found.";
        }
    }

    // public function sendto()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $data = array(
    //             'eemail' =>$this->input->post('eemail')
    //         );

    //         $status = $this->empmodel->emplettersend($data);

    //         if ($status == true) {
    //             echo '<html>
    //         <head>
    //             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    //         </head>
    //         <body>
    //             <script>
    //                 Swal.fire({
    //                     title: "Letter successfully sent",
    //             icon: "success",
    //             buttons: true,
    //             dangerMode: true,
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         window.location.href = "internletter"; 
    //                     }
    //                 });
    //             </script>
    //         </body>
    //         </html>';
    //         } else {
    //         }
    //     } else {
    //         $this->load->view('internletter');
    //     }
    // }
    // 
    // public function sendto()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $this->form_validation->set_rules('eemail', 'Employee Email', 'required');

    //         if ($this->form_validation->run() == FALSE) {
    //             echo validation_errors();
    //             return;
    //         }

    //         $eemail = $this->input->post('eemail');
    //         $position = $this->input->post('position');
    //         $duration = $this->input->post('duration');
    //         $date = $this->input->post('date');
    //         $employee = $this->empmodel->getEmployeeByEmail($eemail);

    //         if ($employee) {
    //             $letter_content = $this->load->view('internletter', $employee, TRUE);

    //             $data = array(
    //                 'eemail' => $eemail,
    //                 'letter_content' => $letter_content,
    //                 'position' => $position,
    //                 'duration' =>$duration,
    //                 'date' =>$date
    //             );

    //             $inserted = $this->db->insert('sendto', $data);

    //             if ($inserted) {

    //                 echo '<html>
    // //         <head>
    // //             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    // //         </head>
    // //         <body>
    // //             <script>
    // //                 Swal.fire({
    // //                     title: "Letter successfully sent",
    // //             icon: "success",
    // //             buttons: true,
    // //             dangerMode: true,
    // //                 }).then((result) => {
    // //                     if (result.isConfirmed) {
    // //                         window.location.href = "internletter"; 
    // //                     }
    // //                 });
    // //             </script>
    // //         </body>
    // //         </html>';
    //             } else {
    //                 $response = array('status' => 'error', 'message' => 'Failed to save letter. Please try again.');

    //             }
    //         } else {
    //             //$response = array('status' => 'error', 'message' => 'Employee with email ' . $eemail . ' not found.');
    //             echo '<html>
    // //         <head>
    // //             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    // //         </head>
    // //         <body>
    // //             <script>
    // //                 Swal.fire({
    // //                     title: "No employee found with specified mail id",
    // //             icon: "danger",
    // //             buttons: true,
    // //             dangerMode: true,
    // //                 }).then((result) => {
    // //                     if (result.isConfirmed) {
    // //                         window.location.href = "internletter"; 
    // //                     }
    // //                 });
    // //             </script>
    // //         </body>
    // //         </html>';
    //         }
    //         echo json_encode($response);
    //     } else {
    //         $this->load->view('internletter');
    //     }
    // }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('eemail', 'Employee Email', 'required');
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                return;
            }

            $eemail = $this->input->post('eemail');
            $position = $this->input->post('position');
            $duration = $this->input->post('duration');
            $date = $this->input->post('date');

            $employee = $this->empmodel->getEmployeeByEmail($eemail);

            if ($employee) {
                $data = array(
                    'eemail' => $eemail,
                    'letter' => 'yes',
                    'position' => $position,
                    'duration' => $duration,
                    'date' => $date
                );

                $status = $this->empmodel->insertSendTo($data);

                if ($status) {
                    //$response = array('status' => 'success', 'message' => 'Letter successfully sent to ' . $eemail);

                    echo '<html>
         <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                             Swal.fire({
                    title: "Letter successfully sent",
             icon: "success",
            buttons: true,
            dangerMode: true,
                }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "genletter"; 
                    }
                });
             </script>
         </body>
        </html>';
                } else {
                    // $response = array('status' => 'error', 'message' => 'Failed to save letter. Please try again.');
                }
            } else {
                // $response = array('status' => 'error', 'message' => 'Employee with email ' . $eemail . ' not found.');
                echo '<html>
         <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                             Swal.fire({
                    title: "Failed to send!",
             icon: "danger",
            buttons: true,
            dangerMode: true,
                }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "genletter"; 
                    }
                });
             </script>
         </body>
        </html>';
            }

            //echo json_encode($response);
        } else {
            $this->load->view('internletter');
        }
    }

    public function internship_offer_letter($employee_id)
    {
        $this->load->model('empmodel');
        $data['employees'] = $this->empmodel->getEmpsById($employee_id);
        $this->load->view('internletter', $data);
    }

    public function empdashboard()
    {
        $this->load->view('empdashboard');
    }

    // public function empexpletter()
    // {
    //     $this->load->view('empexpletter');
    // }

    public function insertexp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('eemail', 'Employee Email', 'required');
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                return;
            }

            $eemail = $this->input->post('eemail');
            $tech = $this->input->post('tech');
            $pname = $this->input->post('pname');
            $duration = $this->input->post('duration');
            $fromdate = $this->input->post('fromdate');
            $todate = $this->input->post('todate');


            $employee = $this->empmodel->getEmployeeByEmail($eemail);

            if ($employee) {
                $data = array(
                    'eemail' => $eemail,
                    'letter' => 'yes',
                    'tech' => $tech,
                    'pname' => $pname,
                    'duration' => $duration,
                    'fromdate' => $fromdate,
                    'todate' => $todate
                );

                $status = $this->empmodel->insertSendExpTo($data);

                if ($status) {
                    //$response = array('status' => 'success', 'message' => 'Letter successfully sent to ' . $eemail);

                    echo '<html>
         <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                             Swal.fire({
                    title: "Letter successfully sent",
             icon: "success",
            buttons: true,
            dangerMode: true,
                }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "genletter"; 
                    }
                });
             </script>
         </body>
        </html>';
                } else {
                }
            } else {
                echo '<html>
         <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                             Swal.fire({
                    title: "Failed to send!",
             icon: "danger",
            buttons: true,
            dangerMode: true,
                }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "genletter"; 
                    }
                });
             </script>
         </body>
        </html>';
            }
        } else {
            $this->load->view('internexp');
        }
    }

    public function internexpletter()
    {
        if ($this->session->userdata('eid')) {
            $eid = $this->session->userdata('eid');
            $data['employees'] = $this->empmodel->getEmpsById($eid);

            $this->load->view('empexpletter', $data);
        }
    }

    // public function internship_certificate($employee_id)
    // {
    //     $this->load->model('empmodel');
    //     $data['employees'] = $this->empmodel->getEmpsById($employee_id);
    //     $this->load->view('empexpletter', $data);
    // }
}
