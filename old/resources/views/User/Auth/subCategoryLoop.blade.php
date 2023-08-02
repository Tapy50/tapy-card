<?php

    function subCategory ($sub,$data){
        $body = '';
        if(count($sub->children) > 0){
            $body .=' <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                            <div class="accordion-header">
                                              <div class="content  collapsed"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#testCollapse'.$sub->id.'" aria-expanded="false" aria-controls="testCollapse'.$sub->id.'">
                                                <div class="accordion-logo">
                                                    <img src="'.$sub->image.'" alt="">
                                                </div>
                                                <div class="accordion-details">
                                                  <div class="accordion-details-title">
                                                    <h3 >'.$sub->title.'</h3>
                                                  </div>
                                                  <div class="accordion-details-footer">
                                                      <p>12 Employees</p>
                                                      <span><img src="'.asset('assets/newProfile/images/icons/Star.png').'" alt="gold star"> 4.7</span>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                            <div id="testCollapse'.$sub->id.'" class="accordion-collapse collapse">
<div class="accordion-body">
   <ul>

';
            foreach($sub->children as $subCat){
                $body .= '<li>'.subCategory3($subCat ,$data).'</li>';

            }
            $body .=' </ul></div>   </div>  </div> </div>';

        }else{
            $body .= '<li> <div class="content  collapsed " style="width:90%">
                                                  <div class="accordion-logo">
                                                      <a href="'.url('Employees/'.$sub->id.'/'.$data).'">
                                                        <img src="'.$sub->image.'" alt="">
                                                      </a>
                                                  </div>
                                                  <div class="accordion-details">
                                                    <div class="accordion-details-title">
                                                      <h3 >'.$sub->title.'</h3>
                                                    </div>
                                                  </div>
                                                </div> </li>';
            }

        return $body;
    }
function subCategory3 ($sub ,$data){
    $body = '';
    if(count($sub->children) > 0){
        $body .=' <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                            <div class="accordion-header">
                                              <div class="content  collapsed"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#testCollapse'.$sub->id.'" aria-expanded="false" aria-controls="testCollapse'.$sub->id.'">
                                                <div class="accordion-logo">
                                                    <img src="'.$sub->image.'" alt="">
                                                </div>
                                                <div class="accordion-details">
                                                  <div class="accordion-details-title">
                                                    <h3 >'.$sub->title.'</h3>
                                                  </div>
                                                    <div class="accordion-details-footer">
                                                      <p>1 Employees</p>
                                                      <span><img src="'.asset('assets/newProfile/images/icons/Star.png').'" alt="gold star"> 4.7</span>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                            <div id="testCollapse'.$sub->id.'" class="accordion-collapse collapse">

<div class="accordion-body">
   <ul>

';
        foreach($sub->children as $subCat){
            $body .= '<li>'.subCategory3($subCat,$data).'</li>';

        }
        $body .=' </ul></div>   </div>  </div> </div>';
    }else{
        $body .= ' <li><div class="content  collapsed " style="width:90%">
                                                  <div class="accordion-logo">
                                                      <a href="'.url('Employees/'.$sub->id.'/'.$data).'">
                                                        <img src="'.$sub->image.'" alt="">
                                                      </a>
                                                  </div>
                                                  <div class="accordion-details">
                                                    <div class="accordion-details-title">
                                                      <h3 >'.$sub->title.'</h3>
                                                    </div>
                                                  </div>
                                                </div> </li>';
    }
    return $body;

}

?>
