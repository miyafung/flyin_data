<?php
namespace Admin\Controller;
//后台首页
class IndexController extends CommonController{
    //后台首页，显示服务器基本信息
    public function index(){
        $serverInfo = array(
            //获取服务器信息（操作系统、Apache版本、PHP版本）
            'server_version' => $_SERVER['SERVER_SOFTWARE'],
            //获取MySQL版本信息
            'mysql_version' => $this->getMySQLVer(),
            //获取服务器时间
            'server_time' => date('Y-m-d H:i:s', time()),
            //上传文件大小限制
            'max_upload' => ini_get('file_uploads') ? ini_get('upload_max_filesize') : '已禁用',
            //脚本最大执行时间
            'max_ex_time' => ini_get('max_execution_time').'秒',
            // '$user_IP '=> $_SERVER["REMOTE_ADDR"],

        );

        //数据分析
        $info = M('goods');
        $sumScore = $info->order('hits')->sum('hits');//产品浏览量
        $pdfScore = $info->order('pdfhits')->sum('pdfhits');//PDF总下载量
        $maxScore = $info->max('hits');
        $minScore = $info->min('hits');
        $mingoods =   $info -> order('hits') -> limit(3) -> select();
        $maxgoods =   $info -> order('hits desc') -> limit(3) -> select();
        $this ->assign('mingoods',  $mingoods);
        $this ->assign('maxgoods',  $maxgoods);
        $this ->assign('minScore',  $minScore);
        $this ->assign('maxScore',  $maxScore);
        $this ->assign('sumScore', $sumScore);
        $this ->assign('pdfScore', $pdfScore);



        //根据IP统计 网站访问     也可以统计产品的访问记录
        $ip=get_client_ip(); //获取客户端IP
        //$ip= $_SERVER["REMOTE_ADDR"];
        $Ip = new \Org\Net\IpLocation('qqwry.dat'); // 实例化类 参数表示IP地址库文件 参考官方文档
        $area = $Ip->getlocation(); // 获取某个IP地址所在的位置

        ini_set('date.timezone','Asia/Shanghai');//设置时区
        $date=date('Y-m-d');//获取当前时间
        $yesterday=date("Y-m-d",strtotime("-1 day")); //获取昨天时间
        $yesterrow=M('ipcount')->field('nowdatec')->where('nowdate="'.$yesterday.'"')->select();
        $yesterdayc=0;
        for ($i=0;$i<count($yesterrow);$i++){
            $yesterdayc+=$yesterrow[$i]['nowdatec'];
        }
        $row=M('ipcount')->field('ip')->where('nowdate="'.$date.'"')->select();//查找今天的记录
        $n=1;
        $add=array(
            'nowdatec'=>$n,
            'nowdate'=>$date,
            'ip'=>$ip,
            'area'=>$area,
        );
        if(empty($row)){//判断并添加记录
            M('ipcount')->add($add);
        }
        $iprow=M('ipcount')->field('ip')->where('ip like "%'.$ip.'%" and nowdate="'.$date.'"')->select();//查找今天的ip记录
        $ipcount=$row[0]['ip'];
        if(empty($iprow)){ //判断并更新IP和统计记录
            $ipcount=$ipcount.$ip;
            $row1=M('ipcount')->field('nowdatec')->where('nowdate="'.$date.'"')->select();
            foreach($row1 as $cd){
                $dd= $cd['nowdatec'];
            }

            $dd+=1;
            $save=array(
                'nowdatec'=>$dd,
                'nowdate'=>$date,
                'ip'=>$ipcount,
            );
            M('ipcount')->where('nowdate="'.$date.'"')->save($save); //判断并更新IP和统计记录
        }
        $nowrow=M('ipcount')->field('nowdatec')->where('nowdate="'.$date.'"')->select();
        $nowsun=0;
        for ($i=0;$i<count($nowrow);$i++){
            $nowsun+=$nowrow[$i]['nowdatec'];
        }



        //数据分析
        $info = M('goods');
        $sumScore = $info->order('hits')->sum('hits');//产品浏览量
        $pdfScore = $info->order('pdfhits')->sum('pdfhits');//PDF总下载量
        $maxScore = $info->max('hits');
        $minScore = $info->min('hits');

        $mingoods =   $info -> order('hits') -> limit(3) -> select();
        $maxgoods =   $info -> order('hits desc') -> limit(3) -> select();

        //新闻栏目统计
        $Dao = M(news);
        //或者使用 $Dao = new Model();
        $newlist = $Dao->query("select count(a.newcategory_id) as num,c.name,c.id from flyin_news a,flyin_newcategory c where a.newcategory_id=c.id group by c.name order by c.id desc");

        //服务支持栏目统计
        $Services = M(services);
        //或者使用 $Dao = new Model();
        $servicelist = $Services->query("select count(a.servicecategory_id) as num,c.name,c.id from flyin_services a,flyin_servicecategory c where a.servicecategory_id=c.id group by c.name order by c.id desc");

        //服务支持栏目统计
        $Goods = M(goods);
        $goodlist = $Goods->query("select count(a.cat_id) as num,c.cat_name,c.cat_id from flyin_goods a,flyin_category c where a.cat_id=c.cat_id group by c.cat_name order by c.cat_id desc");

        //banner栏目统计
        $Banners = M(banners);
        $bannerlist = $Banners->query("select count(a.bannercategory_id) as num,c.name,c.id from flyin_banners a,flyin_bannercategory c where a.bannercategory_id=c.id group by c.name order by c.id desc");

        $this ->assign('bannerlist',  $bannerlist);
        $this ->assign('goodlist',  $goodlist);
        $this ->assign('servicelist',  $servicelist);
        $this ->assign('newlist',  $newlist);
        $this ->assign('mingoods',  $mingoods);
        $this ->assign('maxgoods',  $maxgoods);
        $this ->assign('minScore',  $minScore);
        $this ->assign('maxScore',  $maxScore);
        $this ->assign('sumScore', $sumScore);
        $this ->assign('pdfScore', $pdfScore);

        //视图
        $this->assign('serverInfo',$serverInfo);
        $this->display();
    }

    //获取MySQL版本
    private function getMySQLVer(){
        $rst = M()->query('select version() as ver');
        return isset($rst[0]['ver']) ? $rst[0]['ver'] : '未知';
    }

    public function ipaddress()
    {
        $ip = get_client_ip();
        import('ORG.Net.IpLocation');// 导入IpLocation类
        $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        $area = $Ip->getlocation('203.34.5.66'); // 获取某个IP地址所在的位置
    }


}
