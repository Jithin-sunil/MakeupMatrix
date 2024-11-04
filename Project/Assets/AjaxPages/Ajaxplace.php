<option >--select---</option>
<?php
include('../Connections/Connection.php');


											$selquery="select * from tbl_place where district_id=".$_GET["did"];
											$result=$con->query($selquery);
											while($data=$result->fetch_assoc())
												{
								?>
                                <option value="<?php echo $data["place_id"]?>"><?php echo $data["place_name"] ?></option>
                        		<?php
												}
								?>
                        
                








