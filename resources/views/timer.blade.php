

<div style="font-weight: bold" id="quiz-time-left"></div>
<div id="time">

</div>

<script>
var c=0;
var timer =select('#timer');
timer.html('0')
function timeIt()
{
  c++;
  timer.html(c);
  c++;

}
setInterval(timeIt, 1000);
</script>

 



		
