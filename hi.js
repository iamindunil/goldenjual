document.getElementById('sumbitBtn').addEventListener('click',function(createtable)
{
    console.log("uthara");
    var row=document.getElementById("row").value;
    var columns=document.getElementById("columns").value;

    var i=0;
    var k=0;

    document.write("<table border='1'>");
    for(i=1;i<=row;i++)
    {
        document.write("<tr>");
        for(k=1;k<=columns;k++)
        {
            document.write("<td>"+i*k+"</td>");
        }
        document.write("</tr>");
    }
    document.write("</table>");
}


)
