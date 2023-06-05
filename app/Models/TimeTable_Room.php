<?php

namespace App\Models;
use App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable_Room extends Model
{
    use HasFactory;
    public $table = 'TimeTable_Room';
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
}
