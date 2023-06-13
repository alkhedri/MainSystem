<?php

namespace App\Models;
use App\Models\room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable_Room extends Model
{
    use HasFactory;
    public $table = 'timetable_room';
    public $timestamps = false;

    
    public static function getStpRoomByDayID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Stp');
        $ROOMName = Room::where('id' , $ROOMID)->value('name');

        
          return $ROOMName;
      }
      public static function getStpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Stp');
  
          return $ROOMID;
      }
///////////////////////////////////////////////////////////////////////////
      public static function getSpRoomByDayID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Sp');
        $ROOMName = Room::where('id' , $ROOMID)->value('name');

          return $ROOMName;
      }
      public static function getSpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Sp');
  
          return $ROOMID;
      }
      ///////////////////////////////////////////////////////////////////////////
      public static function getTpRoomByDayID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Tp');
        $ROOMName = Room::where('id' , $ROOMID)->value('name');

          return $ROOMName;
      }
      public static function getTpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Tp');
  
          return $ROOMID;
      }
///////////////////////////////////////////////////////////////////////////
      public static function getFpRoomByDayID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Fp');
        $ROOMName = Room::where('id' , $ROOMID)->value('name');

          return $ROOMName;
      }
      public static function getFpRoomID($id){
        $ROOMID = TimeTable_Room::where('day_id' , $id)->value('Fp');
  
          return $ROOMID;
      }



      public static function getRoom($id , $period){
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
             
           


        $value = TimeTable_Room::where('day_id', $id)->value($sql);
        return  ($value);
  
    }
}
