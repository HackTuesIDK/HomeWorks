colors = Hash.new
color_num = 0
Dir.chdir File.dirname(__FILE__)
text=File.open('html/HomeWorks.css').read
text.gsub!(/\r\n?/, "\n")
text.each_line do |line|
	if line.include? '#' and line.split(//).first != '#' then
		color = line.split("#").last.split(";").first
		color_num += 1
		colors["##{color}"] = color_num
	end
end
fileHtml = File.new("html/colors/the_colors_from_css.html", "w+")
filecss = File.new("html/colors/the_colors_from_css.css", "w+")
fileHtml.puts "<HTML><head><meta content=\"text/html; charset=UTF-8;\" http-equiv=\"content-type\"><title>11b HomeWorks 2014-2015</title><link rel=\"stylesheet\" type=\"text/css\" href=\"the_colors_from_css.css\"></head><body>"

colors.sort.each do |key, value|
	fileHtml.puts "<p id = \"id#{value}\">#{key}</p>"
	filecss.puts "#id#{value}"
	filecss.puts "{	background-color: #{key};
			padding:30px;
			font-family: Arial;
			font-size: 16px;
			text-decoration: none;
			color: black;}"
end
fileHtml.puts "</body></HTML>"

filecss.puts "body"
filecss.puts "	{
			background-color: black;
		}"
