<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户管理</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/user-manage.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/vue.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
       <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
	<?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
</head>
 <!-- <script>
        var window_topo_web_path = 'http://10.10.1.67:8080/net/index.php';
        var window_topo_static_path = "<?php echo base_url(); ?>";
    </script>
     -->
<body>

<div id="myModal" class="modal" data-backdrop="static">
    <!--第二层-->
    <div class="">
        <!--第三层 :背景，边框，倒角，阴影-->
        <div class="modal-content">
            <!--第四层：控制内容-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="modal-title">新建账号</h4>
            </div>
            <div class="modal-body">
               <!--  <form> -->
                    <fieldset id="fieldset">
                        <div class="form-group">
                            <label for="disabledTextInput">账号名称</label>
                            <input type="text" id="disabledTextInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email-add">初始密码</label>
                            <input type="password" id="email-add" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ipsw">重复初始密码</label>
                            <input type="password" id="ipsw" class="form-control">
                        </div>

                        <!--<div class="checkbox">-->
                        <!--<label>-->
                        <!--<input type="checkbox"> Can't check this-->
                        <!--</label>-->
                        <!--</div>-->
                        <button type="button" id="modal-sure">确定</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-exit">取消</button>
                    </fieldset>
                <!-- </form> -->

            </div>

        </div>
    </div>
</div>
<div id="container">
    <!-- 左侧边栏-->
   <div id="left-navigation">
        <ul>
            <li>
                <img src="<?php echo base_url(); ?>images/u470.png" alt=""/>
                <img src="<?php echo base_url(); ?>images/u468.png" alt=""/>
            </li>
            <a href="<?php echo site_url('panel/panel'); ?>">
                <li>

                    <span class="glyphicon glyphicon-home" style="font-size: 20px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180433.png" alt=""/>-->
                    </span>
                    <p>仪表面板</p>

                </li>
            </a>
            <a href="<?php echo site_url('quick_avigation/quick_avigation'); ?>">
                <li>
                    <span class="glyphicon glyphicon-flag" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/>-->
                    </span>
                    <p>快速向导</p>
                </li>
            </a>
            <a href="<?php echo site_url('topo_manage/topo_manage'); ?>">
                <li >
                    <span class="glyphicon glyphicon-calendar" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180506.png" alt=""/>-->
                    </span>
                    <p>拓扑管理</p>
                </li>
            </a>
            <?php if ($this->session->userdata('root') == 'True') {?>
            <a href="<?php echo site_url('net_log/log'); ?>">
                <li >
                    <span class="glyphicon glyphicon-list-alt" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180522.png" alt=""/>-->
                    </span>
                    <p>日志管理</p>
                </li>
            </a>
            
            <a href="<?php echo site_url('sys_manage/sys_manage'); ?>">
                <li >
                    <span class="glyphicon glyphicon-cog" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180543.png" alt=""/>-->
                    </span>
                    <p>系统管理</p>
                </li>
            </a>
            <a href="<?php echo site_url('admin_manage/admin_manage'); ?>" style="transform:scale(1.15);">
                <li >
                    <span class="glyphicon glyphicon-user" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124435.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">用户管理</p>
                </li>
            </a>
            
            <?php }?>
          
            <a href="<?php echo site_url('personal/personal'); ?>">
                <li >
                    <span class="glyphicon glyphicon-envelope" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124507.png" alt=""/>-->
                    </span>
                    <p>个人中心</p>
                </li>
            </a>
        </ul>
    </div>
    <!-- top导航-->
    <div id="top-navigation">
        <ul id="top-navigation-left">
            <li>中国电信云计算实验室</li>
            <li class="animated rubberBand">网络模拟平台</li>
        </ul>
        <ul id="top-navigation-right">
            <li class="animated tada"><img src="<?php echo base_url(); ?>images/u74.png" alt=""/></li>
            <li>Welcome, <span id="user" class="user"><?php echo $this->session->userdata('username');?></span></li>
            <li>
                    <span>
                        <a href="<?php echo site_url('login/logout'); ?>" >
                            <img src="<?php echo base_url(); ?>images/exit.png" alt="" id="exit" title="退出系统"/>
                        </a>
                    </span>
            </li>
        </ul>
    </div>
    <!-- 主面板-->
    <div id="section">
        <div id="user-manage">
            <ul>
                <li class="animated fadeInRight" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">用户管理</li>
                <li class="animated fadeInRight">账号总数:<?=count($admin_list['user_list'])?></li>
            </ul>

        </div>
        <div id="create-newUsers" >
            <button id="btn" data-toggle="modal" data-target="#myModal">新建账号</button>
            <div class="domab" style="position: relative">
                <div class="" style="float:right;">
                    <label>
                        <input type="text" class="dsearch" placeholder="请输入关键字..." aria-controls="example" id="search-input">
                        <img src="<?php echo base_url(); ?>images/2017-08-18_165039.png" alt="" id="search-img">
                    </label>
                </div>

                <button id="button" style="float:left;" class="btn11">删除账号</button>
                <div style="float:left; position:relative; z-index:9999;height:100%;">
                    
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="wt100" style="position:relative; overflow:hidden; height:100%">
                <table id="example" class="display animated slideInUp" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style=" width:1px; padding:0"></th>
                        <th style="width:30px; padding:10px 0 10px 10px">
                            <input type="checkbox" id="checkAll"></th>
                        <th>账号名称</th>
                        <th>用户类型</th>
                       
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $admin_num = 1;if(!empty($admin_list['user_list'])){foreach($admin_list['user_list'] as $data): ?>
                    <tr>
                        <td></td>
                        <td>
                            <input type="checkbox" name="checkList"></td>
                        <td>
                            <?php echo $data['user_name'];?>
                        </td>
                        <td><?php if($data['root'] == "True"){echo "管理员";}else{echo  "普通用户";}?></td>
                        <!--<td>3核/1G</td>-->
                        <!--<td>5G</td>-->
                        <!--<td>CentOS 56.5</td>-->
                        <!--<td>运行中</td>-->
                    </tr>
                    <?php $admin_num++; endforeach; } ?>
                 

                    </tbody>
                </table>
                <div class="showslider">
                    <button class="closediv">关闭</button>
                </div>
                <style>
                    .showslider {
                    display:none;
                        width: 80%;
                        height: 100%;
                        background-color: #fff;
                        border: 1px solid #ccc;
                        position: absolute;
                        top: 9px;
                    }

                    .addselect {
                        border-radius: 2px;
                        display: inline-block;
                        background-color: #ccc;
                        height: 12px;
                        width: 16px;
                        text-align: center;
                        color: #fff;
                        font-size: 9px;
                        font-family: Arial;
                        position: relative;
                        margin-left: 4px;
                        cursor: pointer;
                        overflow: hidden;
                        vertical-align: top;
                        top: 1px;
                    }

                    .addselect select {
                        width: 44px;
                        opacity: 0;
                        position: absolute;
                        left: 0;
                        top: 0;
                        cursor: pointer;
                    }

                    table.dataTable tbody th, table.dataTable th, table.dataTable tbody td {
                        font-size: 12px;
                        text-align: left;
                    }

                    table.dataTable thead th {
                        padding: 0 8px;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>


<script>
    $(function () {

        var table = $('#example').DataTable({
            "dom": '<"top"f >rt<"bottom"ilp><"clear">',//dom定位
            "dom": 'tiprl',//自定义显示项
            //"dom":'<"domab"f>',
            "scrollY": "305px",//dt高度
            "lengthMenu": [
                [8, 6, 8, -1],
                [4, 6, 8, "All"]
            ],//每页显示条数设置
            "lengthChange": false,//是否允许用户自定义显示数量
            "bPaginate": true, //翻页功能
            "bFilter": false, //列筛序功能
            "searching": true,//本地搜索
            "ordering": true, //排序功能
            "Info": true,//页脚信息
            "autoWidth": true,//自动宽度
            "oLanguage": {//国际语言转化
                "oAria": {
                    "sSortAscending": " - click/return to sort ascending",
                    "sSortDescending": " - click/return to sort descending"
                },
                "sLengthMenu": "显示 _MENU_ 记录",
                "sZeroRecords": "对不起，查询不到任何相关数据",
                "sEmptyTable": "未有相关数据",
                "sLoadingRecords": "正在加载数据-请等待...",
                "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录。",
                "sInfoEmpty": "当前显示0到0条，共0条记录",
                "sInfoFiltered": "（数据库中共为 _MAX_ 条记录）",
                "sProcessing": "<img src='<?php echo base_url(); ?>resources/user_share/row_details/select2-spinner.gif'/> 正在加载数据...",
                "sSearch": "模糊查询：",
                "sUrl": "",
                //多语言配置文件，可将oLanguage的设置放在一个txt文件中，例：Javascript/datatable/dtCH.txt
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": " 上一页 ",
                    "sNext": " 下一页 ",
                    "sLast": " 尾页 "
                }
            },

            "columnDefs": [
                {
                    orderable: false,

                    targets: 0 },
                {
                    orderable: false,

                    targets: 1 }
            ],//第一列与第二列禁止排序

            "order": [
                [0, null]
            ],//第一列排序图标改为默认
            initComplete: function () {//列筛选
                var api = this.api();
                api.columns().indexes().flatten().each(function (i) {
                    if (i != 0 && i != 1) {//删除第一列与第二列的筛选框
                        var column = api.column(i);
                        var $span = $('<span class="addselect">▾</span>').appendTo($(column.header()))
                        var select = $('<select><option value="">All</option></select>')
                                .appendTo($(column.header()))
                                .on('click', function (evt) {
                                    evt.stopPropagation();
                                    var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                    );
                                    column
                                            .search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                });
                        column.data().unique().sort().each(function (d, j) {
                            function delHtmlTag(str) {
                                return str.replace(/<[^>]+>/g, "");//去掉html标签
                            }

                            d = delHtmlTag(d)
                            select.append('<option value="' + d + '">' + d + '</option>')
                            $span.append(select)
                        });

                    }
                });

            }

        });

        //添加索引列
        table.on('order.dt search.dt',
                function () {
                    table.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();

        //自定义搜索
        $('.dsearch').on('keyup click', function () {
            var tsval = $(".dsearch").val()
            table.search(tsval, false, false).draw();
        });

        //checkbox全选
        $("#checkAll").on("click", function () {
            if ($(this).prop("checked") === true) {
                $("input[name='checkList']").prop("checked", $(this).prop("checked"));
                $('#example tbody tr').addClass('selected');
            } else {
                $("input[name='checkList']").prop("checked", false);
                $('#example tbody tr').removeClass('selected');
            }
        });

        //显示隐藏列
        $('.toggle-vis').on('change', function (e) {
            e.preventDefault();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());
        });

        //删除选中行
        $('#example tbody').on('click', 'tr input[name="checkList"]', function () {
            var $tr = $(this).parents('tr');
            $tr.toggleClass('selected');
            var $tmp = $('[name=checkList]:checkbox');
            $('#checkAll').prop('checked', $tmp.length == $tmp.filter(':checked').length);

        });

        $('#button').click(function () {

           // table.row('.selected').remove().draw(false);
        	var length = $('[name=checkList]:checkbox').filter(':checked').length;
			
			if(length == 0){
				alert_func.error("请选择要删除的用户"); return;
			}

			if(length > 1){
				alert_func.error("请选择一个要操作的用户");return;
			}

			if(length == 1){
//				var user_name = $('[name=checkList]:checkbox').filter(':checked').next().find("a").text();
				var user_name = $('[name=checkList]:checked').parent().next().text().trim();
				
				var obj = {'user_name':user_name};
				
				if(confirm("删除用户?") == true ) {
					$.post('<?php echo site_url("admin_manage/admin_manage/del_user"); ?>',obj,function(result) {  
						var results = eval("(" + result + ")");
		                  
			            if(results.retCode == "0" ) {
			            	alert_func.success("删除成功");
			            	window.location.href = "<?php echo site_url('admin_manage/admin_manage'); ?>";
			            }
			            else {
			            	alert_func.error("删除失败"); 
			            }
			            
			        });  
				}else
				{
					return;
					}	
			}
        });


      //新建账号确定
        $('#modal-sure').click(function () {
			var user_name = $("#disabledTextInput").val();
			var passwd = $("#ipsw").val();
			var email = $("#email-add").val();
			if(!user_name || !passwd){
				alert_func.error('账号或者密码不能为空！');return;
			}
			if( email != passwd){
				alert_func.error('两次输入的密码不一致！');return;
			}

			var obj = {
					'user_name':user_name,
					'passwd':passwd,
					'email':email
					};	
			$.post('<?php echo site_url("admin_manage/admin_manage/add_manager"); ?>',obj,function(result) {
				var results = eval("(" + result + ")");
                
	            if(results.retCode == "0" ) {	
	            	alert_func.success("添加成功");            	
	            	window.location.reload();
	            }
	            else {
	            	alert_func.error("添加失败");   
	            }
			})	
        })
        
        $('.showcol').click(function () {
            $('.showul').toggle();

        })

        //获取表格宽度赋值给右侧弹出层
        wt = $('.wt100').width();
        $('.showslider').css('right', -wt);

        //关闭右侧弹出层
        $('.closediv').click(function () {
            $(this).parent('.showslider').animate({
                right: -wt
            }, 200)
            $('.clickdom').attr('isclick', true)
        });


    })

    //右侧弹出详情层
    /*  var flag=false;
     function clickDom(obj){
     var  $par=$(obj).parents('#example_wrapper').siblings('.showslider')
     var  isattr=$(obj).attr('isclick');
     if(isattr=="true"){
     if(flag){
     $par.animate({
     right:-wt
     },200)
     flag=!flag
     }
     else{
     $par.animate({
     right:0
     },200)
     flag=!flag

     }
     }
     $('.clickdom').attr('isclick',false)
     $(obj).attr('isclick',true)


     }
     */
    function clickDom(obj) {
        var $par = $(obj).parents('#example_wrapper').siblings('.showslider')
        var isattr = $(obj).attr('isclick');
        if (isattr == "false") {

        } else {
            $par.animate({
                right: -wt
            }, 200)
            $par.animate({
                right: 0
            }, 400)
            $('.clickdom').attr('isclick', true)
            $(obj).attr('isclick', false)
        }

    }

</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>