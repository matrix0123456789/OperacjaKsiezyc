var curmsg=0
var curs=0
slidemessage();
function slidemessage(){
curmsg = curmsg + 5;

if (curmsg>200)
{
curs = 300 - curmsg;
obr.style.filter = 'alpha(opacity='+curs+')';
if (curs>10)
{
obr.style.opacity='0.'+curs;
}
else if (curs<11)
{
obr.style.opacity='0.0'+curs;
}
}
else
{

obr.style.filter = 'alpha(opacity='+curmsg+')';
}
if (curmsg<100)
{
if (curmsg==100)
{
obr.style.opacity='1';
}
else if (curmsg>10)
{
obr.style.opacity='0.'+curmsg;
}
else if (curmsg<11)
{
obr.style.opacity='0.0'+curmsg;
}
}
else
{

}

setTimeout("slidemessage()",100)
}