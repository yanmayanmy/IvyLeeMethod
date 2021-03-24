<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IvyLee_index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Tokyo');
	}

	public function index($year = false, $month = false)
	{
		$data['title'] = 'Home';
		$date = new DateTime();
		if ($year === false) {
			$data['year'] = $date->format('Y');
		} else {
			$data['year'] = $year;	
		}
		if ($month === false) {
			$data['month'] = $date->format('m');
		} else {
			$data['month'] = $month;	
		}

		$prefs = [
			'show_next_prev' => true,
			'next_prev_url' => base_url() . 'IvyLee_index/index/'
		];
		$prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr class="cal_header">{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}" class="h1 m-5">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr class="week_name_row">{/week_row_start}
        {week_day_cell}<td class="week_name_data h5">{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="cal_row">{/cal_row_start}
        {cal_cell_start}<td class="cal_data">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
		';

		$this->load->library('calendar', $prefs);

		$data['link'] = array();
		for ($i = 1; $i <= $this->calendar->get_total_days($data['month'], $data['year']); $i++) {
			$data['link'] += [
				$i => base_url('IvyLee_index/edit_page/' . $data['month']. '/' . $i)
			];
		}

		$this->load->view('templates/header', $data);
		$this->load->view('body/home', $data);
		$this->load->view('templates/footer');
	}



	public function login()
	{
	}

	public function edit_page($month, $day)
	{
		$data['month_name'] = [
			'January', 
			'Febuary', 
			'March', 
			'April', 
			'May', 
			'June', 
			'July', 
			'August', 
			'September', 
			'October', 
			'November', 
			'December' 
		];
		$data['title'] = 'To Do List';
		$data['month'] = $month;
		$data['day'] = $day;

		$this->load->view('templates/header', $data);
		$this->load->view('body/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{

	}
}
