<?php

/**
 * Rate quotes.
 * 
 * controllers/Rate.php
 *
 * ------------------------------------------------------------------------
 */
class Rate extends Application {

    function __construct()
    {
	parent::__construct();
    }

    function index() {
        // detect non-AJAX entry
        if (!isset($_POST['action'])) redirect("/");
        // extract parameters
        $id = intval($_POST['idBox']);
        $rate = intval($_POST['rate']);
        // update the posting
        $record = $this->quotes->get($id);
        if ($record != null) {
          $record->vote_total += $rate;
          $record->vote_count++;
          $this->quotes->update($record);
        }
        $response = 'Thanks for voting!';
        echo json_encode($response);	
    }
}

/* End of file Rate.php */
/* Location: application/controllers/Rate.php */