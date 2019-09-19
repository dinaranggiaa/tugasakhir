<?php 
class Sms extends MY_Controller
{
    public function create()
    {
        $input = (object) $this->input->post(null, true);
        if(!$_POST) {
            $input = $this->sms->getDefaultValues();
            $input = (object) $input;
        }

        $validate = $this->sms->validate();
        if(!$validate) {
            $mainView = 'sms/form';
            $heading = 'SMS';
            $formAction = 'sms/create';
            $buttonText = 'Send';
            $this->load->view('sms', compact(
                'mainView',
                'heading',
                'formAction',
                'input',
                'buttonText'
            ));
            return;
        }

        $insert = $this->sms->insert($input);
        if(!$insert) {
            flashmessage('error', 'SMS gagal dikirim!');
        } else {
            flashmessage('success', 'SMS berhasil dikirim.');
        }

        redirect('sent', 'refresh');
    }
}
?>