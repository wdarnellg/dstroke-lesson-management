<p>Thank you 
@foreach($lessonhours->players as $player)
    {{ $player->getFullName($player->id) }}, 
@endforeach
for your  {{ $hoursused->date_time->format('D-M-d-Y') }} lesson/practice.  You have {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours') }} hour(s) remaing in your current {{ $lessonhours->packages->name }} package.
<br>
You can view the package hours details by logging in <a href="http://dstroketennis.com/mylessonhours">Here</a>, click on view > Lesson Hours > Package Details to view hours remaining.
</p>
<p>You can set up lesson/workout times by going to my <a href="http://dstroketennisprepaid.youcanbook.me">Scheduler</a></p> </p>