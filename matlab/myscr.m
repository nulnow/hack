clear;

n = 10; % ���-�� �������������
k = 3; % ����������� ������������


users = rand(n,k) .* 200 - 100;


dist = zeros(n);

for i = 1:k-1
    for j = i+1:k
        dist(i, j) = compdist(users(i,:), users(j,:));
    end
end

