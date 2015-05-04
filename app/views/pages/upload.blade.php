<html>
@include('include.headMain')
<body>
    <p>主配置文件上传，请先选择文件，然后点击提交，最后点击更新</p>
    <form method="post" action="upload/main" id="" enctype ='multipart/form-data' >
    <input type="file" name="main_file">
    <input type="submit" name="submit">
    </form>
    <button onclick="location='/dbweb'">更新</button>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <p>推荐配置文件上传</p>
    <form method="post" action="upload/rec" id="" enctype ='multipart/form-data' >
    <input type="file" name="rec_file">
    <input type="submit" name="submit">
    </form>
    <button onclick="location='/dbrec'">更新</button>
    <br/>
    <br/>
    <br/>
    <p>图片上传</p>
    <form method="post" action="upload/img" id="" enctype ='multipart/form-data' >
    <input type="file" name="rec_file">
    <input type="submit" name="submit">
    </form>
    
    
</body>
</html>
