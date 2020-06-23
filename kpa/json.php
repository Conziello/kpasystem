<?php include('db_fns.php');
$id=$_GET['id'];

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => $_SESSION['database'],
    'host' => 'localhost'
);
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
$where = "";
 switch($id){

    case 1:
    // DB table to use
    $table = 'tenants';
     
    // Table's primary key
    $primaryKey = 'id';
    $where = "status=1";
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'kpano', 'dt' => 0 ),
            array( 'db' => 'tid', 'dt' => 1 ),
            array( 'db' => 'idno', 'dt' => 2 ),
            array( 'db' => 'bname', 'dt' => 3 ),
            array( 'db' => 'phone',  'dt' => 4 ),
            array( 'db' => 'date',   'dt' => 5 ),
            array( 'db' => 'bal',    'dt' => 6 )
        );

    break;

     case 2:
    // DB table to use
    $table = 'tenants';
     
    // Table's primary key
    $primaryKey = 'id';
    $where = "status!=1";
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
       $columns = array(
            array( 'db' => 'kpano', 'dt' => 0 ),
            array( 'db' => 'tid', 'dt' => 1 ),
            array( 'db' => 'idno', 'dt' => 2 ),
            array( 'db' => 'bname', 'dt' => 3 ),
            array( 'db' => 'phone',  'dt' => 4 ),
            array( 'db' => 'date',   'dt' => 5 ),
            array( 'db' => 'bal',    'dt' => 6 )
        );

    break;

     case 3:
    // DB table to use
    $table = 'houses';
     
    // Table's primary key
    $primaryKey = 'rid';
    
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'housename', 'dt' => 0 ),
            array( 'db' => 'rid', 'dt' => 1 ),
            array( 'db' => 'roomno', 'dt' => 2 ),
            array( 'db' => 'location', 'dt' => 3 ),
            array( 'db' => 'roomtype',  'dt' => 4 ),
            array( 'db' => 'rent',   'dt' => 5 ),
            array(
            'db'        => 'status',
            'dt'        => 6,
            'formatter' => function( $d, $row ) {
                if($d==1){return 'Occupied';}else {return 'Empty';}
            }
            ),
            array( 'db' => 'tenant',    'dt' => 7 )
        );

    break;

    case 4:
    // DB table to use
    $table = 'receipts';
     
    // Table's primary key
    $primaryKey = 'serial';
    
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'tname', 'dt' => 0 ),
            array( 'db' => 'rno', 'dt' => 1 ),
            array(
            'db'        => 'drcr',
            'dt'        => 2,
            'formatter' => function( $d, $row ) {
                if($d=='dr'){return 'Invoice';}
                else if($d=='cr'){return 'Receipt';}
                else if($d=='rf'){return 'Refund Note';}
                else if($d=='cn'){return 'Credit Note';}
            }
            ),
            array( 'db' => 'date', 'dt' => 3 ),
            array( 'db' => 'amount',  'dt' => 4 ),
             array( 'db' => 'invno',  'dt' => 5 ),
             array( 'db' => 'rcptno',  'dt' => 6 ),
             array( 'db' => 'credno',  'dt' => 7 ),
             array( 'db' => 'refundno',  'dt' => 8 ),
        );

    break;

    case 5:
    // DB table to use
    $table = 'receipts';
     
    // Table's primary key
    $primaryKey = 'serial';
    $where = "drcr='cr'";
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'date', 'dt' => 0 ),
            array( 'db' => 'description', 'dt' => 1 )
        );

    break;

     case 6:
    // DB table to use
    $table = 'cards';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'cardno', 'dt' => 1 ),
            array( 'db' => 'memberno', 'dt' => 2 ),
            array( 'db' => 'membername', 'dt' => 3 ),
            array( 'db' => 'date', 'dt' => 4 ),
            array(
            'db'        => 'status',
            'dt'        => 5,
            'formatter' => function( $d, $row ) {
                if($d==0){return '<b style="background:#ff3">Un-Assigned,Inactive</b>';}
                else if($d==1){return '<b style="background:#0f6">Assigned,Active</b>';}
                else if($d==2){return '<b style="background:#f00">Assigned,Inactive</b>';}
               
            }
            ),
        );

    break;

    case 7:
    // DB table to use
    $table = 'workshops';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'title', 'dt' => 1 ),
            array( 'db' => 'location', 'dt' => 2 ),
            array( 'db' => 'startdate', 'dt' => 3 ),
            array( 'db' => 'enddate', 'dt' => 4 ),
            array( 'db' => 'date', 'dt' => 5 ),
            array(
            'db'        => 'startstamp',
            'dt'        => 6,
            'formatter' => function( $d, $row ) {
                if($d>date('Ymd')){return '<b style="background:#ff3">Open</b>';}
                else if($d==date('Ymd')){return '<b style="background:#0f6">Active</b>';}
                else {return '<b style="background:#f00">Closed</b>';}
                
            }
            ),
        );

    break;


    case 8:
    // DB table to use
    $table = 'forums';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'title', 'dt' => 1 ),
            array( 'db' => 'author', 'dt' => 2 ),
            array( 'db' => 'startdate', 'dt' => 3 ),
            array( 'db' => 'date', 'dt' => 4 ),
            array(
            'db'        => 'status',
            'dt'        => 5,
            'formatter' => function( $d, $row ) {
                if($d==1){return '<b style="background:#0f6">Open</b>';}
               else {return '<b style="background:#f00">Closed</b>';}
                
            }
            ),
        );

    break;

    case 9:
    // DB table to use
    $table = 'cme';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'title', 'dt' => 1 ),
            array( 'db' => 'author', 'dt' => 2 ),
            array( 'db' => 'startdate', 'dt' => 3 ),
            array( 'db' => 'enddate', 'dt' => 4 ),
            array(
            'db'        => 'endstamp',
            'dt'        => 5,
            'formatter' => function( $d, $row ) {
                 if($d>date('Ymd')){return '<b style="background:#ff3">Open</b>';}
                else {return '<b style="background:#f00">Closed</b>';}
                
            }
            ),
        );

    break;

    case 10:
    // DB table to use
    $table = 'notices';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'tid', 'dt' => 1 ),
            array( 'db' => 'sendto', 'dt' => 2 ),
            array( 'db' => 'phone', 'dt' => 3 ),
            array( 'db' => 'date', 'dt' => 4 ),
            array( 'db' => 'time', 'dt' => 5 ),
            array( 'db' => 'message', 'dt' => 6),
            array(
            'db'        => 'status',
            'dt'        => 7,
            'formatter' => function( $d, $row ) {
                if($d==1){return '<b style="background:#0f6">Sent</b>';}
               else {return '<b style="background:#ff3">Pending</b>';}
                
            }
            ),
        );

    break;


    case 11:
    // DB table to use
    $table = 'emails';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'tid', 'dt' => 1 ),
            array( 'db' => 'sendto', 'dt' => 2 ),
            array( 'db' => 'email', 'dt' => 3 ),
            array( 'db' => 'date', 'dt' => 4 ),
            array( 'db' => 'time', 'dt' => 5 ),
            array( 'db' => 'message', 'dt' => 6),
            array(
            'db'        => 'status',
            'dt'        => 7,
            'formatter' => function( $d, $row ) {
                if($d==1){return '<b style="background:#0f6">Sent</b>';}
               else {return '<b style="background:#ff3">Pending</b>';}
                
            }
            ),
        );

    break;


    case 12:
    // DB table to use
    $table = 'cme';

     $where = "endstamp>=".date('Ymd')."";
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'title', 'dt' => 1 ),
            array( 'db' => 'author', 'dt' => 2 ),
            array( 'db' => 'startdate', 'dt' => 3 ),
            array( 'db' => 'enddate', 'dt' => 4 ),
            array(
            'db'        => 'endstamp',
            'dt'        => 5,
            'formatter' => function( $d, $row ) {
                 if($d>date('Ymd')){return '<b style="background:#ff3">Open</b>';}
                else {return '<b style="background:#f00">Closed</b>';}
                
            }
            ),
        );

    break;






}
 

 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);