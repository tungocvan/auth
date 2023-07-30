<?php
use App\Models\Thuoc;
use App\Models\Doctors;
use App\Imports\ThuocImport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Groups\src\Models\Groups;

function isDoctorActive($email)
{
    $count = Doctors::where('email', $email)
        ->where('is_active', 1)
        ->count();
    if ($count > 0) {
        return true;
    }
    return false;
}

function ExceltoArray($file)
{
    $products = Excel::toArray(new ProductsImport(), storage_path() . $file);
    $items = [];
    foreach ($products[0] as $key => $product) {
        $temp = [];
        if ($key > 0) {
            foreach ($product as $i => $item) {
                $itemTemp = (string) $products[0][$key][$i];
                if ($products[0][0][$i] == 'images') {
                    $images = explode(';', $itemTemp);
                    //$j=0;
                    foreach ($images as $j => $image) {
                        $images[$j] = ['src' => $image];
                    }
                    //dd($images);
                    $itemTemp = $images;
                }
                if ($products[0][0][$i] == 'categories') {
                    $categories = explode(';', $itemTemp);
                    foreach ($categories as $j => $categorie) {
                        $categories[$j] = ['id' => $categorie];
                    }
                    //dd($images);
                    $itemTemp = $categories;
                }
                $temp[$products[0][0][$i]] = $itemTemp;
            }
            array_push($items, $temp);
            // Ghi vào database
            //$status = $this->woocommerce->addProduct($temp);
        }
    }
    return $items;
}

function ExceltoArrayUpload($file)
{
    $products = Excel::toArray(new ThuocImport(), $file);
    $items = [];
    $chunkSize = 0; // kích thước của từng lô dữ liệu
    $itemsCount = 0;
    foreach ($products[0] as $key => $product) {
        $temp = [];
        if ($key > 0) {
            foreach ($product as $i => $item) {
                $itemTemp = (string) $products[0][$key][$i];
                $temp[$products[0][0][$i]] = $itemTemp;
            }
            $chunkSize = $chunkSize + 1;
            array_push($items, $temp);
            if ($chunkSize == 2000) {
                // Ghi vào database
                echo "Bắt đầu ghi... \n";
                Thuoc::insert($items);
                $itemsCount = $itemsCount + $chunkSize;
                $chunkSize = 0;
                $items = [];
                echo "Đã import xong $itemsCount bản ghi. \n";
            }

            //$status = $this->woocommerce->addProduct($temp);
        }
    }

    if (count($items) > 0) {
        $itemsCount = (string) (count($items) + $itemsCount);
        Thuoc::insert($items);
        echo "Đã import xong $itemsCount bản ghi. \n";
    }

    return 'Đã import xong.';
}
function ExceltoArrayUploadBackup($file)
{
    $products = Excel::toArray(new ThuocImport(), storage_path() . $file);
    $items = [];

    foreach ($products[0] as $key => $product) {
        $temp = [];
        if ($key > 0) {
            foreach ($product as $i => $item) {
                $itemTemp = (string) $products[0][$key][$i];
                $temp[$products[0][0][$i]] = $itemTemp;
            }
            array_push($items, $temp);
            // Ghi vào database
            //$status = $this->woocommerce->addProduct($temp);
        }
    }
    return $items;
}

// public function importSqlFile($sql_file)
//     {
//         // Kiểm tra file SQL có tồn tại hay không
//         if (!file_exists($sql_file)) {
//             return "File not found";
//         }

//         // Lấy nội dung của file SQL
//         $sql_content = file_get_contents($sql_file);

//         // Thực thi các câu lệnh SQL từ file
//         try {
//             DB::unprepared($sql_content);
//             return "Imported successfully";
//         } catch (Exception $e) {
//             return "Error importing file: " . $e->getMessage();
//         }
//     }

function assetPath($type='')
{
    return  asset('phoenix/assets/'.$type); 
}

function getGroupAll()
{
    return Groups::all();
}

function isRole($dataArr,$moduleName,$role='view')
{
    if(!empty($dataArr[$moduleName])){
        $roleArr = $dataArr[$moduleName];
        if(!empty($roleArr) && in_array($role,$roleArr)){
            return true;
        }
    }
    return false;
}

function checkPermissions($user,$moduleName,$role)
{
    $roleJson = $user->group->permissions;
        if(!empty($roleJson)){
            $roleArr = json_decode($roleJson,true);
            $check = isRole($roleArr,$moduleName,$role);
            return $check;
        }
        
    return false;
}
function getCategories($option)
{   
    //@php echo getCategories(['categories' => $menuItems]); @endphp
    //@php echo getCategories(['categories' => $menuItems,'checkedArr' => [10,8,6]]); @endphp
    $categories = $option['categories'];
    $parentId = $option['parent_id'] ?? 0;
    $char = $option['char'] ?? '';
    $inputName = $option['inputName'] ?? 'category';
    $checkedArr = $option['checkedArr'] ?? null;
    if ($categories) {              
        foreach ($categories as $key => $category) {
            if($checkedArr){
                $checked = '';
                if(in_array($category['id'],$checkedArr)){
                    $checked = 'checked';
                }
                $inputName2 = "<input ".$checked."  value=".$category['id']." type='checkbox' name=".$inputName."[]  /> ";
            }else{
                $inputName2 = '<input  value='.$category['id'].' type="checkbox" name='. $inputName.'[]  /> ';            
            }            
            if ($category['parent_id'] == $parentId) {
                echo "<p style='margin-bottom:8px'>" . $char . $inputName2 .$category['name']."</p>";
                unset($categories[$key]);                    
                getCategories([
                    'categories' => $categories,
                    'parent_id' => $category['id'],
                    'char' => $char . "ㅤㅤ",
                    'checkedArr' => $checkedArr
                ]);                
            }
        }
    }
}
function getCategoriesOptions($categories, $parentId = 0, $char = '')
{
    if ($categories) {       
        foreach ($categories as $key => $category) {
            if ($category['parent_id'] == $parentId) {
                echo '<option value=' . $category['id'] . '>' . $char . $category['name']. '</option>';
                unset($categories[$key]);
                getCategoriesOptions($categories, $category['id'], $char . "ㅤㅤ");
            }
        }
    }
}

function getCategoriesSingle($option)
{   
    //@php echo getCategories(['categories' => $menuItems]); @endphp
    //@php echo getCategories(['categories' => $menuItems,'checkedArr' => [10,8,6]]); @endphp
    $categories = $option['categories'];
    $parentId = $option['parent_id'] ?? 0;
    $char = $option['char'] ?? '';        
    if ($categories) {                   
        foreach ($categories as $key => $category) {
                   
            if ($category['parent_id'] == $parentId) {
                //echo "<p style='margin-bottom:8px'>" . $char .$category['name']."</p>";
                echo '<option value=' . $category['id'] . '>' . $char . $category['name']. '</option>';
                unset($categories[$key]);                    
                getCategoriesSingle([
                    'categories' => $categories,
                    'parent_id' => $category['id'],
                    'char' => $char . "ㅤㅤ",                    
                ]);                
            }
        }
    }
}

function has_child($data,$id){
    foreach ($data as $v) {
        if($v['parent_id'] == $id){
            return true;
        }
    }
    return false;
}
function render_menu($options){

    $data = $options['data'] ?? [];
    $parent_id = $options['parent_id'] ?? 0;
    $level = $options['level'] ?? 0;
    $idMenu = $options['id'] ?? 'main_menu';
    $classMenu = $options['class'] ?? '';
    if($classMenu !== '') $classMenu="class='$classMenu'";
    if($level == 0) $result = "<ul id='$idMenu' $classMenu  >";
    else $result = "<ul id='sub-menu'>";

    foreach ($data as $key => $v) {
        if($v['parent_id'] == $parent_id){            
            $result .= "<li>";
            $result .= "<a href='{$v['url']}'>{$v['name']}</a>";
            if(has_child($data,$v['id'])){
                unset($data[$key]); 
                $result .= render_menu(['data' => $data,'parent_id' => $v['id'],'level' => $level+1]);
            }
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}