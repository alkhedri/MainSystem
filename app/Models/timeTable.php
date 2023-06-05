<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeTable extends Model
{
    use HasFactory;
    public $table = 'TimeTable';
    public $timestamps = false;

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
