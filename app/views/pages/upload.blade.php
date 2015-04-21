<html>
@include('include.headMain')
<body>
    <p>主配置文件上传</p>
    <form method="post" action="upload/main" id="" enctype ='multipart/form-data' >
    <input type="file" name="main_file">
    <input type="submit" name="submit">
    <button>部署</button>
    </form>
    <br/>
    <br/>
    <p>推荐配置文件上传</p>
    <form method="post" action="upload/rec" id="" enctype ='multipart/form-data' >
    <input type="file" name="rec_file">
    <input type="submit" name="submit">
    <button>部署</button>
    </form>
    
</body>
</html>
