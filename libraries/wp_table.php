<?php

namespace RsilitechPostcodeAvailability\Libraries;

// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	
}

use WP_List_Table;

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Rilitech_List_Table extends WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items($table_data=array())
    {
		
		
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
		$data=$table_data;
        usort( $data, array( &$this, 'sort_data' ) );

        $perPage = 10;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

	    
	function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="postcode[]" value="%s" />', $item['ID']
        );    
    }
	 function get_bulk_actions() {

        $actions = array(

            'delete'    => 'Delete'

        );

        return $actions;

    }

    function process_bulk_action() {

        //Detect when a bulk action is being triggered...

        if( 'delete'===$this->current_action() ) {

            wp_die('Items deleted (or they would be if we had items to delete)!');

        }

    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = array(
            '0'         => '<input type="checkbox" />',
            '1'       	=> 'Postcode',
            '3' 		=> 'City',
            '4'        	=> 'State',
            '5'    		=> 'Country',
            '6'      	=> 'Cod Available',
			'7'      	=> 'Delivered in days',
			'8'     	=> 'Note'
        );
        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns()
    {
        return array('1' => array('1', false));
    }

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data()
    {
        $data = array();

        return $data;
    }

    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name )
    {
		
        switch( $column_name ) {
            case '0': echo '<input name="postcode[]" type="checkbox" class="postcode_check"  value="'.$item[0].'" />';break;
            case '1':
            case '3':
            case '4':
            case '5':
            case '6':
			case '7':
			case '8':
                return $item[ $column_name ];

            default:
               
        }
    }
	
	function column_1($item) {
		$actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s">'.esc_html('Edit','rsilitech-postcode-availability').'</a>',sanitize_key($_REQUEST['page']),'edit',$item[0]),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">'.esc_html('Delete','rsilitech-postcode-availability').'</a>',sanitize_key($_REQUEST['page']),'remove',$item[0]),
        );

  return sprintf('%1$s %2$s', $item[1], $this->row_actions($actions) );
}

    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = '1';
        $order = 'asc';

        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby']))
        {
            $orderby = sanitize_key( $_GET['orderby']);
        }

        // If order is set use this as the order
        if(!empty($_GET['order']))
        {
            $order = sanitize_key( $_GET['order']);
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc')
        {
            return $result;
        }

        return -$result;
    }
}
?>