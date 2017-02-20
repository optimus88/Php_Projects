<SCRIPT LANGUAGE="JavaScript">
//call_calander
<!-- Begin
var flg=0;
var fs=1;
var bg="cyan";
M=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
D=new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
function getBgn(){
pdy=new Date();        // today
pmo=pdy.getMonth();    // present month
pyr=pdy.getYear();     // present year
if (pyr<100) pyr="19" + pyr;
else pyr+=1900;
yr1=(pmo==0?pyr-1:pyr); // last month's year
mo=(pmo==0?11:pmo-1);  // last month
bgn=new Date(M[mo]+" 1,"+yr1); // assign to date
document.write('<TABLE BORDER=0><TR><TD VALIGN=TOP>');
Calendar();           // Send last month to screen
document.write('</TD><TD VALIGN=TOP>');
yr=pyr;                // present year
mo=pmo;                // present month
bgn=new Date(M[mo]+" 1,"+yr1); // assign to date
Calendar();           // Send this month to screen
document.write('</TD><TD VALIGN=TOP>');
yr=(pmo==11?pyr+1:pyr); // next month's year
mo=(pmo==11?0:pmo+1);   // next month
bgn=new Date(M[mo]+" 1,"+yr1); // assign to date
Calendar();           // Send next month to screen
document.write('</TD></TR></TABLE>'); // Finish up
}
function Calendar(){
dy=bgn.getDay();
yr=eval(yr1);
d="312831303130313130313031";
if (yr/4==Math.floor(yr/4)){
 d=d.substring(0,2)+"29"
 +d.substring(4,d.length);
 }
pos=(mo*2);
ld=eval(d.substring(pos,pos+2));
document.write("<TABLE BORDER=1"
+" BGCOLOR='"+bg
+"'><TR><TD ALIGN=CENTER COLSPAN=7>"
+"<FONT SIZE="+fs+">"+M[mo]+" "+yr
+"</FONT></TD></TR><TR><TR>");
for (var i=0;i<7;i++){
document.write("<TD ALIGN=CENTER>"
+"<FONT SIZE=1>"+D[i]+"</FONT></TD>");
 }
document.write("</TR><TR>");
ctr=0;
for (var i=0;i<7;i++){
if (i<dy){
document.write("<TD ALIGN=CENTER>"
+"<FONT SIZE="+fs+"> </FONT>"
+"</TD>");
}
else{
ctr++;
document.write("<TD ALIGN=CENTER>"
+"<FONT SIZE="+fs+">"+ctr+"</FONT>"
+"</TD>");
   }
}
document.write("</TR><TR>");
while (ctr<ld){
for (var i=0;i<7;i++){
ctr++;
if (ctr>ld){
document.write("<TD ALIGN=CENTER>"
+" </TD>");
}
else{
document.write("<TD ALIGN=CENTER>"
+"<FONT SIZE="+fs+">"+ctr+"</FONT>"
+"</TD>");
   }
}
document.write("</TR><TR>");
}
document.write("</TR></TABLE>");
}
// End -->
</SCRIPT>