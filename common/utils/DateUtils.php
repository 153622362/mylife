<?php
namespace common\utils;
class DateUtils{
	
	//静态变量保存全局实例
	private static $_instance = null;
	//私有构造函数，防止外界实例化对象
	private function __construct() {
	}
	//私有克隆函数，防止外办克隆对象
	private function __clone() {
	}
	//用来保存当前请求的时间
	private $req_time=0;
	
	//静态方法，单例统一访问入口
	public static function getInstance() {
		if (is_null ( self::$_instance )) {
			self::$_instance = new self ();
			self::$_instance->req_time=$_SERVER['REQUEST_TIME'];
		}
		return self::$_instance;
	}
	/**
	 * 格式化时间，根据用户请求时间，无论这个请求处理了多久，获取的都是以请求时间为准的
	 * @param String $format：格式如：
	 * <br/>
	 * 	Y-m-d H:i:s
	 * <br/>
	 * 	Y/m/d H:i:s
	 * <br/>等等
	 */
	public function reqTimeFormat($format='Y-m-d H:i:s'){
		return date($format,$this->req_time);
	}
	/**
	 * 每一次调用，返回的都是最新的时间
	 * @param String $format：格式如：
	 * <br/>
	 * 	Y-m-d H:i:s
	 * <br/>
	 * 	Y/m/d H:i:s
	 * <br/>等等
	 */
	public function nowTimeFormat($format='Y-m-d H:i:s'){
		return date($format,time());
	}
	/**
	 * 以请求时间为准，返回请求时的unix时间戳
	 */
	public function reqTimestamp (){
		return $this->req_time;
	}


    public function getMonthDay($date){
        $date1 = date('Y-m-01',strtotime($date));
        $date2 = date('Y-m-d',strtotime('+1 month',strtotime($date1))-1);

        return count($this->getDayNum($date1,$date2));
    }

    /**
     * @param string $start 2017-10-01
     * @param string $end   2017-10-05
     * @return array|string
     */
    public function getDayNum($start,$end){

        if(!$start || !$end || (strtotime($end)<strtotime($start))) return '';
        $start = strtotime($start);
        $end   = strtotime($end);

        $i=0;
        $d=array();
        while($start<=$end){
            //这里累加每个月的的总秒数 计算公式：上一月1号的时间戳秒数减去当前月的时间戳秒数
            $d[$i]=date('Y-m-d',$start);
            $start = strtotime('+1 Day',$start);
            $i++;
        }
        return $d;
    }

    /**
     * 根据每一天，返回整个月的日期 例如10月份：2018-10-01 - 2018-10-31
     * @param $date
     * @return mixed
     */
    public function getDayTotal($date)
    {
        $timestamp = strtotime($date);
        if( $date && $timestamp>0 ){
            $dayNum = $this->getMonthDay($date);
            $dateYm = date('Y-m',$timestamp);
            $dayNumArr = [];
            for ( $i=1;$i<=$dayNum;$i++ ){
                if( $i<10 ){
                    $dayNumArr[] = $dateYm.'-0'.$i;
                }else{
                    $dayNumArr[] = $dateYm.'-'.$i;
                }

            }
            return $dayNumArr;
        }
        return $date;
    }


    /**
     * 获取时间戳差值（单位：s）
     * @param $start
     * @param $end
     * @return float|int|string
     */
    public function getDifferTimestamp($start,$end)
    {
        $start = strtotime($start);
        $end = strtotime($end);
        if(!$start || !$end || ($end<$start)) return '';
        return Calculation::subtract($end,$start,0);
    }

}


