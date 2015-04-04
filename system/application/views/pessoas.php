<html>
 <head>     
 <title></title>
 </head>
 <body>
 <h1></h1>
    <blockquote>
       <p><b>
            <ul>       
                <?php foreach ($pessoas as $id => $pessoa): ?>
                       <li>
                           <?php print nl2br(" {$id} - {$pessoa['nome']}  -  {$pessoa['profissao']}  \n "); ?>
                       </li>
                <?php endforeach; ?>
            </ul>
       </b></p>
    </blockquote>
    
 </body>
 </html>