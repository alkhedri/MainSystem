<?php

namespace App\Models;


use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeTable extends Model
{
    use HasFactory;
    public $table = 'timetable';
    public $timestamps = false;

    public static function getRows($day){
        $user_id = auth()->user()->id;
    
      
        $department_id = Instructor::where('id',$user_id)->value('department_id');

        $rows = TimeTable::where('department_id', $department_id)->where('day', $day)->get();
    
        return  ($rows->count() + 1);
  
    }
    public static function getPeriod($id , $period){
        $sql;
            switch($period){
                   case 1 :
                    $sql = 'Stp'  ;
                    break;
                    case 2 :
                        $sql = 'Sp'  ;
                        break;
                        case 3 :
                            $sql = 'Tp'  ;
                            break;
                            case 4 :
                                $sql = 'Fp'  ;
                                break;
            }
             
           

        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
        $value = TimeTable::where('department_id', $department_id)->where('id', $id)->value($sql);
        return  ($value);
  
    }
    public static function day($id){
        

        switch($id){
            case 0 :
                    return 'السبت';
                break;
                case 1 :
                    return 'الأحد';
                    break;
                    case 2 :
                        return 'الاثنين';
                        break;
                        case 3 :
                            return 'الثلاثاء';
                            break;
                            case 4 :
                                return 'الاربعاء';
                                break;
                                case 5 :
                                    return 'الخميس';
                                    break;
                                                                                    


        }
 
      }
}
