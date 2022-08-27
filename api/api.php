<?php
include ('../db.php');

$return_data = array();

session_start();

$req = isset($_POST['req']) ? $_POST['req'] : 0;
$param = isset($_POST['param']) ? $_POST['param'] : 0;
$data = isset($_POST['data']) ? $_POST['data'] : 0;
$field_list = isset($_POST['get']) ? $_POST['get'] : '*';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
$multi_select = isset($_POST['msel']) ? $_POST['msel'] : 0;
$match_id = isset($_POST['match']) ? $_POST['match'] : 0;

switch ($req)
{
        //  for employee list
        
    case '1':
        $table = 'departments';
    break;
     case '2':
        $table = 'sections';
    break;
    case '3':
        $table = 'students';
    break;
    default:
        $table = '';

}

// parameter
// ------------------------------------------------------------------
switch ($param)
{

        case '1':
         $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
         $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
         break;

        case '2': //department list
            $multi_level_select = '<option value="0">-- Select Section --</option>';
            if ($filter != '') getSelectMultilevel(0, '', $table, 'id', 'id', $field_list, true, 0, true, $filter, $match_id,);
            else getSelectMultilevel(0, '', $table, 'id', 'id', $field_list, true, $match_id);
            $return_data = $multi_level_select;
            break;

         case '3':

            $sql = 'SELECT * FROM ' . $table . ' WHERE is_active = 1';
            // echo $sql;
            $sql .= ($filter != '') ? ' AND ' . $filter : '';
            $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
            break;

        case '4': 
            $sql = 'SELECT *,(SELECT name from departments WHERE id=`dept_id`) as dept_name,(SELECT name from sections WHERE id=`section_id`) as sec_name FROM students WHERE status = 1 ORDER BY id DESC';
            // $sql = 'SELECT * FROM '.$table.' WHERE status = 1 ORDER BY id DESC';
              $return_data = getHTML_empTable($sql,true);
            break;
        case '5': // 1-SELECT specific emp list in modal
                $sql = 'SELECT *,(SELECT name from departments WHERE id=`dept_id`) as dept_name,(SELECT name from sections WHERE id=`section_id`) as sec_name FROM '.$table.' WHERE  '.$data;
                $return_data = getHTML_empModal($sql,true);

         case '6': // 1-SELECT specific emp list in modal
                $sql = 'SELECT *,(SELECT name from departments WHERE id=`dept_id`) as dept_name,(SELECT name from sections WHERE id=`section_id`) as sec_name FROM '.$table.' WHERE  '.$data;
               $return_data = getHTML_empEditModal($sql,true);

    }

    echo json_encode($return_data);

     function getSelectHTMLDept($sql, $matchID, $field_name, $multisel = false, $optOnly = false)
    {
        global $con, $filter;
        try
        {
            $multi = ($multisel) ? 'multiple="multiple"' : '';
            $field_name = ($multisel) ? $field_name . '[]' : $field_name;
            $rHTML = '<select class="chosen-select sel2 width-100" ' . $multi . ' id="' . $field_name . '" name="' . $field_name . '">';
            $rHTML = ($optOnly) ? '' : $rHTML;
            $rHTML .= ($multisel) ? '<option value="-1">ALL</option>' : '<option value="0" selected>-- Select --</option>';

            $stmt = $con->prepare($sql, array(
                PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
            ));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                if ($row['id'] == $matchID) $rHTML = $rHTML . '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
                else $rHTML = $rHTML . '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
            $rHTML = ($optOnly) ? $rHTML : $rHTML . '</select>';
        }
        catch(PDOException $e)
        {
            $rHTML = $e->getMessage();
        }

        return $rHTML;
    }

       // Start function for get organizations name
    function getHTML_organization_list_Table($sql)
    {
        global $con;
        try
        {
            $bHTML = ' <option value="-1">All</option>';

            $stmt = $con->prepare($sql, array(
                PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
            ));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                $bHTML .= '
               
               <option value="' . $row['id'] . '">' . $row['name'] . '</option>
          ';

            }
        }
        catch(PDOException $e)
        {
            $bHTML = $e->getMessage();
        }
        return $bHTML;
    }

     function getSelectMultilevel($id = 0, $mrk = '', $tableName, $foreign_key_name, $orderby_name, $pkey_name, $req_name, $sel = false, $matchID = 0, $custom = false, $custom_str = '')
    {
        global $con, $multi_level_select, $user_id;
        $sql = ($custom) ? 'SELECT * FROM ' . $tableName . ' WHERE ' . $foreign_key_name . ' = ' . $id . ' AND ' . $custom_str . ' ORDER BY ' . $orderby_name . ' ASC' : 'SELECT * FROM ' . $tableName . ' WHERE ' . $foreign_key_name . ' = ' . $id . ' ORDER BY ' . $orderby_name . ' ASC';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();
        //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            if ($sel) if ($row[$pkey_name] == $matchID) $multi_level_select .= '<option value="' . $row[$pkey_name] . '" selected>' . $mrk . $row[$req_name] . '</option>';
            else $multi_level_select .= '<option value="' . $row[$pkey_name] . '">' . $mrk . $row[$req_name] . '</option>';
            else $multi_level_select .= $mrk . $row[$pkey_name] . '-' . $row[$req_name];

            if ($custom) getSelectMultilevel($row[$pkey_name], '---', $tableName, $foreign_key_name, $orderby_name, $pkey_name, $req_name, $sel, $matchID, true, $custom_str);
            else getSelectMultilevel($row[$pkey_name], '---', $tableName, $foreign_key_name, $orderby_name, $pkey_name, $req_name, $sel, $matchID);
        }

        // echo $matchID;
        
    }

       function getHTML_empTable($sql)
    {
        global $con;
        try
        {
            $bHTML = '';
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $c = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                $bHTML .= '
                            <tr>
                                <th scope="row"> '.$c.' </th> 
                                <td> '.$row['name'].' </td> 
                                <td> '.$row['date'].' </td> 
                                <td> '.$row['email'].' </td> 
                                <td> '.$row['contact'].' </td>
                                <td> '.$row['address'].' </td> 
                                <td> '.$row['dept_name'].' </td> 
                                <td> '.$row['sec_name'].' </td> 
                                <td>
                                <button type="button" class="btn btn-default btn-sm" id="view_id" data-id='.$row["id"].'><i class="fas fa-eye"></i></button>
                                <button type="button" class="btn btn-default btn-sm" id="edit_id" data-id='.$row["id"].'><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-default btn-sm" id="delete_id" data-id='.$row["id"].'><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>  
                          ';
                          $c++;
            }

            $rHTML =  $bHTML;
        }
        catch (PDOException $e) 
        {
            $rHTML = $e->getMessage();
        }
        
        return $rHTML;
    }

        function getHTML_empModal($sql)
    {
        global $con;
        try
        {
            $bHTML = '';
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                $bHTML .= '
                            lorem
                          ';
            }
            
            
            $rHTML =  $bHTML;
        }
        catch (PDOException $e) 
        {
            $rHTML = $e->getMessage();
        }
        
        return $rHTML;
    }

    function getHTML_empEditModal($sql)
    {
        global $con;
        try
        {
            $bHTML = '';
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $row = $stmt->fetchall(PDO::FETCH_ASSOC);
            
            
            $rHTML =  $row;
        }
        catch (PDOException $e) 
        {
            $rHTML = $e->getMessage();
        }
        
        return $rHTML;
    }


?>
