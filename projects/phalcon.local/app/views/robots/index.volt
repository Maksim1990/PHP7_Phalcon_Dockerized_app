<div class="page-header">
    <h1>Robots!</h1>
</div>

<p>See my robots!</p>
<ol>
{% for rob in robots %}
        <li>{{ rob.name }}</li>
       <ul>
           {% for robotPart in rob.robotsParts %}
               <li>{{ robotPart.parts.name }}
                   <small>
                       {{ robotPart.parts.comment }}
                   </small>
               </li>
           {% endfor %}
       </ul>
{% endfor %}
</ol>