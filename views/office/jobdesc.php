<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\helpers\ArrayHelper; 
 ?>
<div class="row">
	<div class="job-desc">
		<div>
			<h2>Job Name</h2>
		</div>
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Area
			</div>
			<div class="col-md-10 job-input">
				<div class="form-group col-md-4">
					<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>

		<!-- skill -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Skill
			</div>
			<div class="col-md-10 job-input">
				<div class="">
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> PT
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox2" value="option2"> OT
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox3" value="option3"> ST
						</label>
						</div>
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> NS
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Carer
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Dentalheygenist
						</label>

					</div>
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Dental Dr.
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> CHemist
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Accupuncturis
						</label>
					</div>
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Judo Therapist
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Licensed Massuer
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Others
						</label>
					</div>
				</div>
			</div>
		</div>

		<!-- facility -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Facility
			</div>
			<div class="col-md-10 job-input">
				<div class="">
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> Hospital
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox2" value="option2"> Clinic
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox3" value="option3"> Old peoples Home
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox3" value="option3"> Visiting parents
						</label>

					</div>
					
				</div>
			</div>
		</div>

		<!-- age -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Age
			</div>
			<div class="col-md-10 job-input">
				<div class="">
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> 20 - 30
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox2" value="option2"> 30 - 50
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox3" value="option3"> 50 - 100
						</label>
						

					</div>
					
				</div>
			</div>
		</div>	

		<!-- sex -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Sex
			</div>
			<div class="col-md-10 job-input">
				<div class="">
					<div class="row">
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> M
						</label>
						<label class="checkbox-inline col-md-2">
							<input type="checkbox" id="inlineCheckbox2" value="option2"> F
						</label>
					</div>
					
				</div>
			</div>
		</div>

		<!-- Salary -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Salary
			</div>
			<div class="col-md-10 job-input">
				<div class="form-group col-md-2">
					<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					<select class="form-controld">
						<option>1000</option>
						<option>2000</option>
						<option>3000</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="col-md-1">~vfv</div>
				<div class="form-group col-md-2">
					<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					<select class="form-controld">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>

		<!-- workinghours -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Working hours
			</div>
			<div class="col-md-10 job-input">
				<div class="form-group col-md-6">
					<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
		</div>

		<!-- Holidays -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Holidays
			</div>
			<div class="col-md-10 job-input">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
						    <!-- <label for="exampleInputEmail1">Days</label> -->
						    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Days">
					  </div>
					</div>

					<div class="col-md-10">
						<div class="row">
							Including
						</div>
						<div class="row">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> New years
							</label>
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox2" value="option2"> Golden Week
							</label>
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox3" value="option3"> Public Holidays
							</label>

						</div>
						<div class="row">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> Obon Hoidays
							</label>
						

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Liscence -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Liscence
			</div>
			<div class="col-md-10 job-input">
				<div class="row">
					<div class="col-md-10">
						<div class="row">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> Needed
							</label>
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox2" value="option2"> Not Needed
							</label>
							
							<div class="form-group col-md-3">
								<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
								<select class="form-control">
									<option>5 Years</option>
									<option>2 Years</option>
									<option>3 Years</option>
									<option>4 Years</option>
									<option>5 Years</option>
								</select>
							</div>


						</div>
					
					</div>
				</div>
			</div>
		</div>

		<!-- Foreigner -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Foreigner
			</div>
			<div class="col-md-10 job-input">
				<div class="row">
					<div class="col-md-10">
						<div class="row">
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> Ok
							</label>
							<label class="checkbox-inline col-md-3">
								<input type="checkbox" id="inlineCheckbox2" value="option2"> Not Ok
							</label>
						</div>
					
					</div>
				</div>
			</div>
		</div>

		<!-- Further comments -->
		<div class="row job-desc-r">
			<div class="col-md-2 job-label">
				Further comments
			</div>
			<div class="col-md-10 job-input">
				<div class="row">
					<div class="form-group">
						<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</div>
		</div>

	</div> <!--./Job-desc-->
</div>

<!-- table -->
<div class="row">
	<table class="table">
		<tbody>
			<div class="job-desc-table">
				<div>
					<h2>Job Name</h2>
				</div>
				<tr>
					<td>
						Area
					</td>
					<td>
						<div class="col-md-4 col-xs-12">
							<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</td>
				</tr>

				<!-- skill -->
				<tr>
					<td>
						Skill
					</td>
					<td>
						<div class="">
							<div class="row">
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> PT
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> OT
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> ST
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> NS
								</label>
							</div>
							<div class="row">
							
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Carer
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6 ">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Dentalheygenist
								</label>

								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Dental Dr.
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> CHemist
								</label>
							</div>
							<div class="row">
								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Accupuncturis
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Judo Therapist
								</label>
						<!-- 	</div>
							<div class="row"> -->
								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Licensed Massuer
								</label>
								<label class="checkbox-inliner  col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Others
								</label>
							</div>
						</div>
					</td>
				</tr>

				<!-- facility -->
				<tr>
					<td>
						Facility
					</td>
					<td>
						<div class="">
							<div class="">
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Hospital
								</label>
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> Clinic
								</label>
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> Old peoples Home
								</label>
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> Visiting parents
								</label>

							</div>
							
						</div>
					</td >
				</tr>

				<!-- age -->
				<tr>
					<td>
						Age
					</td>
					<td>
						<div class="">
							<div class="">
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> 20 - 30
								</label>
								<label class="checkbox-inline col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> 30 - 50
								</label>
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> 50 - 100
								</label>
								

							</div>
							
						</div>
					</td>
				</tr>	

				<!-- sex -->
				<tr>
					<td>
						Sex
					</td>
					<td>
						<div class="">
							<div class="row">
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> M
								</label>
								<label class="checkbox-inliner col-md-2 col-xs-6">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> F
								</label>
							</div>
							
						</div>
					</td>
				</tr>

				<!-- Salary -->
				<tr>
					<td>
						Salary
					</td>
					<td>
						<div class="form-group col-md-5">
							<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
							<select class="form-control">
								<option>1000</option>
								<option>2000</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="col-md-1">~</div>
						<div class="form-group col-md-5">
							<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</td>
				</tr>

				<!-- workinghours -->
				<tr>
					<td>
						Working hours
					</td>
					<td>
						<div class="form-group col-md-6">
							<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</td>
				</tr>

				<!-- Holidays -->
				<tr>
					<td>
						Holidays
					</td>
					<td>
						<div class="">
							<div class="col-md-2">
								<div class="form-group">
								    <!-- <label for="exampleInputEmail1">Days</label> -->
								    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Days">
							  </div>
							</div>

							<div class="col-md-10">
								<div class="row">
									Including
								</div>
								<div class="row">
									<label class="checkbox-inliner col-md-3 col-xs-6">
										<input type="checkbox" id="inlineCheckbox1" value="option1"> New years
									</label>
									<label class="checkbox-inliner col-md-3 col-xs-6">
										<input type="checkbox" id="inlineCheckbox2" value="option2"> Golden Week
									</label>
									<label class="checkbox-inliner col-md-3 col-xs-6">
										<input type="checkbox" id="inlineCheckbox3" value="option3"> Public Holidays
									</label>

								</div>
								<div class="row">
									<label class="checkbox-inliner col-xs-6 col-md-3">
										<input type="checkbox" id="inlineCheckbox1" value="option1"> Obon Hoidays
									</label>
								

								</div>
							</div>
						</div>
					</td>
				</tr>

				<!-- Liscence -->
				<tr>
					<td>
						Liscence
					</td>
					<td>
						<div class="">
							<div class="col-md-10">
								<div class="">
									<label class="checkbox-inliner col-xs-6r col-md-3">
										<input type="checkbox" id="inlineCheckbox1" value="option1"> Needed
									</label>
									<label class="checkbox-inliner col-xs-6r col-md-3">
										<input type="checkbox" id="inlineCheckbox2" value="option2"> Not Needed
									</label>
									
									<div class="form-group col-md-3">
										<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
										<select class="form-control">
											<option>5 Years</option>
											<option>2 Years</option>
											<option>3 Years</option>
											<option>4 Years</option>
											<option>5 Years</option>
										</select>
									</div>


								</div>
							
							</div>
						</div>
					</td>
				</tr>

				<!-- Foreigner -->
				<tr>
					<td>
						Foreigner
					</td>
					<td>
						<div class="col-md-10">
							<div class="">
								<label class="checkbox-inliner  col-md-3 col-xs-6">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Ok
								</label>
								<label class="checkbox-inliner col-md-3 col-xs-6">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> Not Ok
								</label>
							</div>
						
						</div>
					</td>
				</tr>

				<!-- Further comments -->
				<tr>
					<td>
						Further comments
					</td>
					<td>
						<div class="">
							<div class="form-group">
								<textarea class="form-control" rows="3"></textarea>
							</div>
						</div>
					</td>
				</tr>

			</div> <!--./Job-desc-->
		</tbody>
	</table>
	
	<?php echo Html::a('<button class="btn btn-default btn-lg pull-right">Done</button>', ['office/pagedesignjobdetails','id'=>''], ['class' => '']) ?>
</div>