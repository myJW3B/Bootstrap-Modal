<?php

/*!
		$modal = new Modal()
			->start_modal('modal_id', 'My Modal', 'default')
			->body('whats in my body')
			->close('footer_id', 'footer text', true);
	might need to update to bootstrap 5
*/

namespace JW3B\gui;

class Modal {

	public $modal = '';
	private $templates = array();

	public function __construct(){
		$this->templates = [
			// I want to put them in here somehow..
		];
	}

	public function start_modal($id, $header_text, $size='default', $backdrop = true){
		$add = $backdrop == true ? ' data-backdrop="static" data-keyboard="false"' : '';
		$this->modal = '<div class="modal fade" tabindex="-1" role="dialog" id="'.$id.'"'.$add.'>
			<div class="modal-dialog modal-'.$size.'">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close hidden-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title">'.$header_text.'</h2>
				</div>';
		return $this;
	}

	public function body($body=''){
		$this->modal .= '<div class="modal-body">'.$body.'</div>';
		return $this;
	}
	//'<div class="modal-footer" id="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button></div>'
	public function close($footer_id = '', $footer_text='', $still_inc_close=false){
		$foot_id = $footer_id == '' ? '' : ' id="'.$footer_id.'"';
		$add = $footer_text != '' ? $footer_text : '';
		if($still_inc_close == true) $add .= '<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>';
		if($add != '') $this->modal .= '<div class="modal-footer"'.$foot_id.'>'.$add.'</div><!-- /.modal-footer -->';
		$this->modal .= '</div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal -->';
		return $this->modal;
	}
}