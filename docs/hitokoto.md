###### 接口描述：

- [一言](hitokoto) 「一言」就好似一个公开的摘抄本，我们在此记录那些让人感怀的，让人振奋的，让人感动的，让人一眼就有所感触的短句，并通过公共 API 的形式使你能够在自己的项目中调用它们。

- 我们希望通过一言，链接大家对各方文字的美好记忆，伴你踩碎迷茫，走过时光。

###### 接口版本

|      版本号       | 制定人  |   制定日期  | 修改日期 |
| :-------------: | :---: | :-----: | :--: |
|      1.0        |  小亦   |2022-06-17 |2023-01-30 |

###### 请求URL:
- `https://你的域名`

###### 请求方式:

- GET/POST

###### 请求参数:

|      名称       | 必填  |   类型  | 说明 |
| :-------------: | :---: | :-----: | :--: |
|      code        |  否   |String |语句编号,默认值:1(可选1~18) |
|      encode        |  否   |String |返回格式,默认值:text(可选json/js) |

###### 语句类型(code):
|      语句编号       | 类型说明  | 
| :-------------: | :---: | 
|      1        |  安慰   |
|      2        |  签名   |
|      3        |  趣味笑话   |
|      4        |  随机一言   |
|      5        |  英汉   |
|      6        |  毒鸡汤   |
|      7        |  爱情   |
|      8        |  温柔|
|      9        |  伤感   |
|      10        |  舔狗   |
|      11        |  社会   |
|      12        |  诗词   |
|      13        |  骚话   |
|      14        |  经典   |
|      15        |  情话   |
|      16        |  人生   |
|      17        |  我在人间凑数的日子   |
|      18        |  网易云   |

###### 返回示例:

`https://你的域名/?encode=json` json格式

```json
{"code":200,"mag":"succes","content":"放下昨天的烦恼，守着今天的幸福，盼着明天的美好。"}
```


###### 引用示例:

```javascript

<p id="hitokoto">Loading...</p>
function getHitokoto() {
    $.ajax({
        url: "//api.isoyi.net/",
        dataType: "json",
        async: true,
        success: function(result) {
            writeHitokoto(result.text,result.source);
        },
        error: function() {
            $('#hitokoto').html("Error...");
        }
    });
}
function writeHitokoto(text,source) {
    if (text.length < 30) {
        if (source.length > 0){
            $('#hitokoto').html(text + " —— " + source);
        } else {
            $('#hitokoto').html(text);
        }
    } else {
        getHitokoto();
    }
}
getHitokoto();

```

###### 备注:
- 若有问题，请及时反馈。