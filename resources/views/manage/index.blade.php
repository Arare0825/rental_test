<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>

<style>
    * {
  margin: 0;
  padding: 0;
  font-family: "Noto Serif JP", serif;
  font-weight: 400;
  font-style: normal;
}

.app {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.header {
  height: 48px;
  box-sizing: border-box;
  border: 8px solid blue;
}

.main {
  display: flex;
  flex-direction: row;
  flex-grow: 1;
}

.sidebar {
  width: 200px;
  box-sizing: border-box;
  border: 8px solid chocolate;
}

.content {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.flex-content {
  flex-grow: 1;
  box-sizing: border-box;
  border: 8px solid green;
}

.fixed-content {
  height: 128px;
  box-sizing: border-box;
  border: 8px solid darkmagenta;
}
.listbutton{
    margin-bottom:30px;
    border:none;
    font-size:20px;
}
a{
  text-decoration: none;
  color:black;
  font-weight:bold;

}
</style>

<body>
    
<div class="app">
      <div class="header">管理TOP</div>
      <div class="main">
        <div class="sidebar">
            <ol>
                <ul>
                <a href="#" class="listbutton">管理TOP</a>
                </ul>
                <ul>
                <a href="#" class="listbutton">レンタル品状況</a>
                </ul>
                <ul>
                <a href="{{ route('item') }}" class="listbutton">アイテム管理</a>
                </ul>
            </ol>
        </div>
        <div class="content">
          <div class="flex-content">コンテンツ1</div>
          <div class="fixed-content">コンテンツ2</div>
        </div>
      </div>
    </div>

</body>
</html>