<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable_Group extends Model
{
    use HasFactory;
    public $table = 'timetable_groups';
    public $timestamps = false;
    

    public static function getStpGroupByDayID($id){
        $group = TimeTable_Group::where('day_id' , $id)->value('Stp');

          return $group;
      }
      public static function getStpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Stp');
  
          return $ROOMID;
      }
///////////////////////////////////////////////////////////////////////////
      public static function getSpGroupByDayID($id){
        $group = TimeTable_Group::where('day_id' , $id)->value('Sp');
 

          return $group;
      }
      public static function getSpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Sp');
  
          return $ROOMID;
      }
      ///////////////////////////////////////////////////////////////////////////
      public static function getTpGroupByDayID($id){
        $group = TimeTable_Group::where('day_id' , $id)->value('Tp');
 

          return $group;
      }
      public static function getTpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Tp');
  
          return $ROOMID;
      }
///////////////////////////////////////////////////////////////////////////
      public static function getFpGroupByDayID($id){
        $group = TimeTable_Group::where('day_id' , $id)->value('Fp');
 

          return $group;
      }
      public static function getFpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Fp');
  
          return $ROOMID;
      }



   public static function getGroupName($id){
                        switch($id){
                            case 0 :
                            return 'A';
                            break;
                                case 1 :
                                    return 'B';
                                    break;
                                    case 2 :
                                        return 'C';
                                        break;
                                        case 3 :
                                            return 'D';
                                            break;
                                            case 4 :
                                                return 'E';
                                                break;
                                                case 5 :
                                                    return 'F';
                                                    break;
                                                    case 6 :
                                                        return 'G';
                                                        break;
                        }

      }
}
